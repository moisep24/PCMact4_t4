<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServidorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'hostname'    => $this->hostname,
            'ip_address'  => $this->ip_address,
            'so'          => $this->so,
            'data_center' => $this->data_center,
            'estado'      => $this->estado,
        ];
    }
}
