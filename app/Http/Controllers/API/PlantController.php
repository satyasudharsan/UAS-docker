<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Plant::paginate(5);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nama_tanaman' => 'required',
            'deskripsi' => 'required',
            'suhu_min' => 'required',
            'suhu_max' => 'required',
            'keterangan_lain' => '',
            'plant_img' => 'required|file|mimes:png,jpg,jpeg',
        ]);

        try {
            $filename = time() . $request->file('plant_img')->getClientOriginalName();
            $path = $request->file('plant_img')->storeAs('uploads/plants', $filename);
            $validation['plant_img'] = $path;
            $response = Plant::create($validation);

            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $response,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'errors' => $e->getMessage(),
            ]);
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
    public function edit($id)
    {
        //
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
        $validation = $request->validate([
            'nama_tanaman' => '',
            'deskripsi' => '',
            'suhu_min' => '',
            'suhu_max' => '',
            'keterangan_lain' => '',
            'plant_img' => 'file|mimes:png,jpg,jpeg',
        ]);

        try {
            if($request->file('plant_img')) {
                $filename = time() . $request->file('plant_img')->getClientOriginalName();
                $path = $request->file('plant_img')->storeAs('uploads/plants', $filename);
                $validation['plant_img'] = $path;
            }
            $response = Plant::find($id);
            $response->update($validation);

            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $response,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'errors' => $e->getMessage(),
            ]);
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
            return response()->json([
                'success' => true,
                'message' => 'Success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'errors' => $e->getMessage(),
            ]);
        }
    }
}
