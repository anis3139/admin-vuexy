<?php

namespace App\Http\Resources\News;

use Illuminate\Http\Resources\Json\JsonResource;

class ViewStoryResource extends JsonResource
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
            'titleEn' => $this->titleEn,
            'titleBn' => $this->titleBn,
            'description' => $this->description,
            'descriptionEn' => $this->descriptionEn,
            'descriptionBn' => $this->descriptionBn,
            'image' => asset($this->image != null ? $this->image : 'default_image/default.jpeg'),
            'publishDate' => date('d M, Y H:i:s', strtotime($this->created_at)),
            'updateDate' => date('d M, Y H:i:s', strtotime($this->updated_at)),
            'publishDateBn' => banglaDate(date('d M, Y H:i:s', strtotime($this->created_at))),
            'updateDateBn' =>  banglaDate(date('d M, Y H:i:s', strtotime($this->updated_at))),
            'published_by' => $this->user->name,
            'tags' => $this->tags,
            'category' => [
                'id' => $this->category->id,
                'nameEn' => $this->category->nameEn,
                'nameBn' => $this->category->nameBn,
                'description' => $this->category->description,
                'image' => asset($this->category->image != null ? $this->category->image : 'default_image/default.jpeg'),
            ],
            'subcategory' => [
                'id' => $this->subcategory_id != null ? $this->subcategory->id : $this->subcategory_id ,
                'nameEn' => $this->subcategory_id != null ? $this->subcategory->nameEn : '',
                'nameBn' => $this->subcategory_id != null ? $this->subcategory->nameBn : '',
                'description' => $this->subcategory_id != null ? $this->subcategory->description : '',
                'image' => asset($this->subcategory_id != null ? $this->subcategory->image :'default_image/default.jpeg'),
            ],

        ];
    }
}
