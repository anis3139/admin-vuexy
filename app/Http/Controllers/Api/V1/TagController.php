<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tag\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){

        $tags = TagResource::collection(Tag::where('status',1)->get());

        if ($tags->count() == 0) {
            $response = [
                'success' => 'false',
                'data' => '',
                'message' => " Tag List Empty",
            ];
            return response()->json($response,400);
        }

        $response = [
            'success' => 'true',
            'data' => $tags,
            'message' => " Tag List Data",
        ];
        return response()->json($response,200);
    }
}
