<?php

namespace App\Http\Resources\SubCategory;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nameEn' => $this->nameEn,
            'nameBn' => $this->nameBn,
            'description' => $this->description,
            'image' => asset($this->image),
            'category' => [
                'id' => $this->category->id,
                'nameEn' => $this->category->nameEn,
                'nameBn' => $this->category->nameBn,
                'description' => $this->category->description,
                'image' => asset($this->category->image),
            ]
        ];
    }
}
