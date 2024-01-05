<?php

namespace App\Http\Controllers\Backpage;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Tabel Kategori";
        $category=new Category;

        if (request()->has('s')) {
            $category = $category->where('nama', 'like', '%' . request('s') . '%');
        }

        $category = $category->paginate(10);
        return view('backpage.category.index', compact('title', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambah Kategori";
        return view('backpage.category.input', compact('title'));
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
            'nama' => 'required',
            'keterangan' => 'required',
        ], $messages);

        try {
            $response = Category::create($validation);

            return redirect()->route('category.admin')->with('success', 'Kategori Berhasil Ditambahkan');
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
        $title = "Ubah Kategori";
        $slug = str_replace('-', ' ', $slug);
        
        $category = Category::where('nama', $slug)->firstOrFail();
        return view('backpage.category.input', compact('category', 'title'));
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
            'nama' => '',
            'keterangan' => '',
        ], $messages);

        try {
            $response = Category::find($id);
            $response->update($validation);

            return redirect()->route('category.admin')->with('success', 'Kategori Berhasil Diubah');
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
            $category=Category::find($id);
            $category->delete();
            return redirect()->route('category.admin')->with('success', 'Tanaman Hias Berhasil Dihapus');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
