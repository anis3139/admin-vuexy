<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(){

        $categories = CategoryResource::collection(Category::where('status',1)->get());

        if ($categories->count() == 0) {
            $response = [
                'success' => 'false',
                'data' => '',
                'message' => " Category List Empty",
            ];
            return response()->json($response,400);
        }

        $response = [
            'success' => 'true',
            'data' => $categories,
            'message' => " Category List Data",
        ];
        return response()->json($response,200);
    }
}
