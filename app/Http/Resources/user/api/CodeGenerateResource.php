<?php

namespace App\Http\Resources\user\api;

use Illuminate\Http\Resources\Json\JsonResource;

class CodeGenerateResource extends JsonResource
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
            'code' => $this->resource
        ];
    }
}
