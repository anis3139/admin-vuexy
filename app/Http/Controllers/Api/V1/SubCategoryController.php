<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubCategory\SubCategoryResource;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){

        $categories = SubCategoryResource::collection(Subcategory::where('status',1)->with('category')->get());

        if ($categories->count() == 0) {
            $response = [
                'success' => 'false',
                'data' => '',
                'message' => " Sub Category List Empty",
            ];
            return response()->json($response,400);
        }

        $response = [
            'success' => 'true',
            'data' => $categories,
            'message' => " Sub Category List Data",
        ];
        return response()->json($response,200);
    }
}
