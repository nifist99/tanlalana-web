<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ArtikelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'judul' => $this->judul,
            'kategori' => $this->kategori_artikel,
            'status'  => $this->status,
            'foto'    => url('storage/'.$this->foto),
            'tanggal' =>Carbon::createFromFormat('d M Y', $this->created_at),
            'content' => $this->content,
        ];
    }
}
