<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\result;


class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::all();
        $data['message'] = true;
        $data['result'] = $fakultas;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:fakultas']);

        $fakultas = Fakultas::create($validate);
        if($fakultas){
            $response['success'] = true;
            $response['message'] = 'Fakultas berhasil ditambahkan!';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultas $fakultas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required'
        ]);

        $result = Fakultas::where('id', operator: $id)->update($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = "Data Fakultas Berhasil di-Update.";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fakultas = Fakultas::find($id);
        if($fakultas){
            $fakultas->delete(); // hapus data fakultas berdasarkan $id
            $data['success'] = true;
            $data['message'] = "Data Fakultas Berhasil Dihapus.";
            return response()->json($data, Response::HTTP_OK);
        } else{
            $data['success'] = false;
            $data['message'] = "Data Fakultas Tidak DItemukan.";
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}
    



