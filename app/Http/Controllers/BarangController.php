<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as BaseController;

use App\Http\Resources\BarangResource;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        return BarangResource::collection($barangs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama_barang' => 'required',
            'kode' => 'required|unique:barangs',
            'kategori' => 'required',
            'jumlah' => 'integer|required',
            'kondisi' => 'required',
            'lokasi' => 'required',
            'merk' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->handleError($validator->errors());
        }
        $barang = Barang::create($input);
        return $this->handleResponse(new BarangResource($barang), 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::find($id);
        if (is_null($barang)) {
            return $this->handleError('Barang tidak ditemukan!');
        }
        return $this->handleResponse(new BarangResource($barang), 'Barang ditemukan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'kode' => 'required|:unique:barangs',
            'jumlah' => 'integer',
        ]);
        if ($validator->fails()) {
            return $this->handleError($validator->errors());
        }
        $barang = Barang::find($id);
        if (is_null($barang)) {
            return $this->handleError('Barang tidak ditemukan!');
        }
        $barang->update($input);
        return $this->handleResponse(new BarangResource($barang), 'Barang berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::find($id);
        if (is_null($barang)) {
            return $this->handleError('Barang tidak ditemukan!');
        }
        $barang->delete();
        return $this->handleResponse(new BarangResource($barang), 'Barang berhasil dihapus!');
    }
    public function mutasiBarang($id)
    {
        $barang = Barang::find($id);
        if (!$barang) {
            return $this->handleError('Barang tidak ditemukan!');
        }
        $mutasis = $barang->Mutasi;
        return $this->handleResponse($mutasis, 'Mutasi Barang.');
    }
}
