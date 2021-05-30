<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class FrontpageController extends Controller
{
    public function index(){
        return view('welcome',[
            'title' => 'Newspaper || Home',
            'latestonenews' => News::orderBy('created_at', 'desc')->take(1)->first(),
            'latestonenewsforslider' => News::orderBy('created_at', 'desc')->take(10)->get(),
            'first_layer' => News::where('category_id','2')->latest()->take(4)->get(),
            'second_layer' => News::where('category_id','3')->latest()->take(4)->get(),
            'second_layer_second' => News::where('category_id','4')->latest()->take(4)->get(),
            'third_layer' => News::where('category_id','5')->latest()->take(4)->get(),
            'fourth_layer' => News::where('category_id','6')->latest()->take(4)->get(),
            'fifth_layer' => News::where('category_id','7')->latest()->take(4)->get(),
            'fifth_layer_second' => News::where('category_id','8')->latest()->take(4)->get(),
            'sixth_layer' => News::where('category_id','9')->latest()->take(4)->get(),
            'sixth_layer_second' => News::where('category_id','10')->latest()->take(4)->get(),
            'seven_layer' => News::where('category_id','11')->latest()->take(4)->get(),
        ]);
    }

    public function categoryWise($id){

        return view('category',[
            'title' => 'Newspaper || Category',
            'categorywisenews' => News::where('category_id',$id)->with('category')->orderBy('created_at', 'desc')->paginate(15),
            'category_name' => Category::where('id',$id)->first(),
        ]);
    }

    public function newsView($id){

        $comments = Comment::where('status','1')->where('news_id',$id)->get();
        $viewnews = News::where('id',$id)->first();
        $viewcount = News::find($id);
        $viewcount->view_count = $viewcount->view_count +1;
        $viewcount->save();
        $related = News::whereHas('category', function ($q) use ($viewnews) {
            return $q->whereIn('category_id', $viewnews->category->pluck('id'));
        })
            ->where('id', '!=', $viewnews->id) // So you won't fetch same post
            ->orderBy('created_at', 'desc')->limit(6)->get();

        return view('news_view',[
            'title' => 'View || News',
            'newsview' => $viewnews,
            'relatednews' => $related,
            'comments' => $comments

        ]);
    }

    public function commentStore(Request $request){

        $rules = [
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required',
        ];
        $this->validate($request, $rules);

        $comment = new Comment();
        $comment->news_id = $request->get('news_id');
        $comment->name = $request->get('name');
        $comment->email = $request->get('email');
        $comment->phone = $request->get('phone');
        $comment->comment = $request->get('comment');
        if ($comment->save()) {

            return redirect()->back()->with('success', 'Comment successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }
}
