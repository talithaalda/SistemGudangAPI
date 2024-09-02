<?php

namespace App\Http\Controllers;

use App\Http\Resources\MutasiResource;
use App\Models\Mutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MutasiController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mutasi = Mutasi::all();
        return MutasiResource::collection($mutasi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'user_id' => 'required|exists:users,id',
            'barang_id' => 'required|exists:barangs,id',
            'status' => 'required',
            'tanggal' => 'required|date',
            'jenis_mutasi' => 'required',
            'jumlah' => 'integer|required',
        ]);
        if ($validator->fails()) {
            return $this->handleError($validator->errors());
        }
        $mutasi = Mutasi::create($input);
        return $this->handleResponse(new MutasiResource($mutasi), 'Mutasi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mutasi = Mutasi::find($id);
        if (is_null($mutasi)) {
            return $this->handleError('Mutasi tidak ditemukan!');
        }
        return $this->handleResponse(new MutasiResource($mutasi), 'Mutasi ditemukan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'user_id' => 'exists:users,id',
            'barang_id' => 'exists:barangs,id',
            'tanggal' => 'date',
            'jumlah' => 'integer',
        ]);
        if ($validator->fails()) {
            return $this->handleError($validator->errors());
        }
        $mutasi = Mutasi::find($id);
        if (is_null($mutasi)) {
            return $this->handleError('Mutasi tidak ditemukan!');
        }
        $mutasi->update($input);
        return $this->handleResponse(new MutasiResource($mutasi), 'Mutasi berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mutasi = Mutasi::find($id);
        if (is_null($mutasi)) {
            return $this->handleError('Mutasi tidak ditemukan!');
        }
        $mutasi->delete();
        return $this->handleResponse(new MutasiResource($mutasi), 'Mutasi berhasil dihapus!');
    }
}
