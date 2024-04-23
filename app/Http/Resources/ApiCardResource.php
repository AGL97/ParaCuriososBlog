<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiCardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [ 
            'title'=>'Title: '. $this->title,
            'description'=>'Description:'. $this->description,
            'imageRoute'=>'Local Route: '. $this->imageRoute,
            'category'=>'Category: '. $this->category,
            //  Para cuando se añada la autenticacion asignar los roles y sistema de pertenencia para cada usuario
            // 'cards'=>'Articles written: ' . $this->cards,
            // 'roles'=>'Roles: ' . $this->roles
        ];
    }
}
