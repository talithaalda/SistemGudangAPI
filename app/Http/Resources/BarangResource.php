<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BarangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'kode' => $this->kode,
            'nama_barang' => $this->nama_barang,
            'kategori' => $this->kategori,
            'jumlah' => $this->jumlah,
            'lokasi' => $this->lokasi,
            'kondisi' => $this->kondisi,
            'merk' => $this->merk,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
