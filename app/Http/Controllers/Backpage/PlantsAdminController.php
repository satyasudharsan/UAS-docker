<?php

namespace App\Http\Controllers\Backpage;

use App\Models\Plant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class PlantsAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Tabel Tanaman";
        $plants=new Plant;

        if (request()->has('s')) {
            $plants = $plants->where('nama_tanaman', 'like', '%' . request('s') . '%');
        }

        if (request()->has('id') && request('id') != '') {
            $plants = $plants->whereHas('category', function ($query) {
                $query->where('categories.id', request('id'));
            });
        }

        $plants = $plants->paginate(10);
        $categories = Category::all();
        return view('backpage.plant.index', compact('plants', 'title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambah Tanaman Hias";
        $categories = Category::all();
        return view('backpage.plant.input', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Kolom :Attribute harus lengkap',
            'file' => 'Perhatikan format dan ukuran file',
        ];

        $validation = $request->validate([
            'nama_tanaman' => 'required',
            'deskripsi' => 'required',
            'suhu_min' => 'required',
            'suhu_max' => 'required',
            'category_id' => 'required',
            'plant_img' => 'required|file|mimes:png,jpg,jpeg',
        ], $messages);

        try {
            $filename = time() . $request->file('plant_img')->getClientOriginalName();
            $path = $request->file('plant_img')->storeAs('uploads/plants', $filename);
            $validation['plant_img'] = $path;
            $response = Plant::create($validation);

            return redirect()->route('plants.admin')->with('success', 'Tanaman Hias Berhasil Ditambahkan');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $title = "Ubah Tanaman Hias";
        $categories = Category::all();
        $slug = str_replace('-', ' ', $slug);
        $plant = Plant::where('nama_tanaman', $slug)->firstOrFail();
        return view('backpage.plant.input', compact('plant', 'title', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'Kolom :attribute harus lengkap',
            'file' => 'Perhatikan format dan ukuran file',
        ];

        $validation = $request->validate([
            'nama_tanaman' => '',
            'deskripsi' => '',
            'suhu_min' => '',
            'suhu_max' => '',
            'category_id' => '',
            'plant_img' => 'file|mimes:png,jpg,jpeg',
        ], $messages);

        try {
            if($request->file('plant_img')) {
                $filename = time() . $request->file('plant_img')->getClientOriginalName();
                $path = $request->file('plant_img')->storeAs('uploads/plants', $filename);
                $validation['plant_img'] = $path;
            }
            $response = Plant::find($id);
            $response->update($validation);

            return redirect()->route('plants.admin')->with('success', 'Tanaman Hias Berhasil Diubah');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $plant=Plant::find($id);
            $plant->delete();
            return redirect()->route('plants.admin')->with('success', 'Tanaman Hias Berhasil Dihapus');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
