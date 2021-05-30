<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\News\CategoryWiseNewsResource;
use App\Http\Resources\News\NewsResource;
use App\Http\Resources\News\SubCategoryWiseNewsResource;
use App\Http\Resources\News\ViewStoryResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){

        $news = NewsResource::collection(News::where('status',1)->latest('id')->paginate(30));
        return $news;
        if ($news->count() == 0) {
            $response = [
                'success' => 'false',
                'data' => '',
                'message' => " News List Empty",
            ];
            return response()->json($response,400);
        }

        $response = [
            'success' => 'true',
            'data' => $news,
            'message' => " News List Data",
        ];
        return response()->json($response,200);
    }

    public function categoryWiseStory($id){

        $news = CategoryWiseNewsResource::collection(News::where(['category_id' => $id,'status' => 1])->latest()->get());


        if ($news->count() == 0) {
            $response = [
                'success' => 'false',
                'data' => '',
                'message' => " Sorry!! No Data Found.",
            ];
            return response()->json($response,400);
        }

        $response = [
            'success' => 'true',
            'data' => $news,
            'message' => " Success!! Category News List Data",
        ];
        return response()->json($response,200);
    }

    public function subCategoryWiseStory($id){

        $news = SubCategoryWiseNewsResource::collection(News::where(['subcategory_id' => $id,'status' => 1])->get());

        if ($news->count() == 0) {
            $response = [
                'success' => 'false',
                'data' => '',
                'message' => " Sorry!! No Data Found.",
            ];
            return response()->json($response,400);
        }

        $response = [
            'success' => 'true',
            'data' => $news,
            'message' => " Success!! Sub Category News List Data",
        ];
        return response()->json($response,200);
    }

    public function view($id){

        $news = News::where(['id' => $id,'status' => 1])->first();

        $viewcount = News::find($id);
        $viewcount->view_count = $viewcount->view_count +1;
        $viewcount->save();

        if (empty($news)) {
            $response = [
                'success' => 'false',
                'data' => '',
                'message' => " Sorry!! No Data Found.",
            ];
            return response()->json($response,400);
        }

        $response = [
            'success' => 'true',
            'data' => new ViewStoryResource($news),
            'message' => " Success!! News View",
        ];
        return response()->json($response,200);
    }

    public function recentStoryBook(){
        $news = NewsResource::collection(News::where('status',1)->latest()->take(12)->get());

        if ($news->count() == 0) {
            $response = [
                'success' => 'false',
                'data' => '',
                'message' => " News  List Empty",
            ];
            return response()->json($response,400);
        }

        $response = [
            'success' => 'true',
            'data' => $news,
            'message' => " News Category List Data",
        ];
        return response()->json($response,200);
    }

    public function newsSearch(Request $request) {
        $news = NewsResource::collection(News::where(['status' => 1])
            ->where('title', 'like', '%' . $request->s . '%')
            ->orWhere('description', 'like', '%' . $request->s . '%')
            ->orWhere('titleEn', 'like', '%' . $request->s . '%')
            ->orWhere('descriptionEn', 'like', '%' . $request->s . '%')
            ->with('category')
            ->latest()
            ->paginate(30));
        if($news->total() > 0){
            $response = [
                'success' => 'true',
                'data' => $news,
                'message' => " News List Data",
            ];
            return response()->json($response,200);
        }else{
            $response = [
                'success' => 'false',
                'data' => '',
                'message' => " News  List Empty",
            ];
            return response()->json($response,400);
        }
    }


}
