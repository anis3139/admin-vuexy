<?php

namespace App\Http\Resources\News;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryWiseNewsResource extends JsonResource
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
            'title' => $this->title,
            'nameEn' => $this->nameEn,
            'nameBn' => $this->nameBn,
//            'description' => preg_replace("/\r\n|\r|\n/", '',$this->description),
            'description' => $this->description,
            'descriptionEn' => $this->descriptionEn,
            'descriptionBn' => $this->descriptionBn,
            'image' => asset($this->image == null ? $this->subcategory->image : $this->image),
            'category' => [
                'id' => $this->category->id,
                'nameEn' => $this->category->nameEn,
                'nameBn' => $this->category->nameBn,
                'description' => $this->category->description,
                'image' => asset($this->category->image),
            ],
            'subcategory' => [
                'id' => $this->subcategory->id,
                'nameEn' => $this->subcategory->nameEn,
                'nameBn' => $this->subcategory->nameBn,
                'description' => $this->subcategory->description,
                'image' => asset($this->subcategory->image),
            ],
            'tag' => [
                'id' => $this->tag->id,
                'nameEn' => $this->tag->nameEn,
                'nameBn' => $this->tag->nameBn,
            ]
        ];
    }
}
