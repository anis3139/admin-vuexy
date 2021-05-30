<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Subcategory;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'prefixname' => 'Admin',
            'title' => 'Dashboard',
            'page_title' => 'Dashboard',
            'category' => Category::count(),
            'subcategory' => Subcategory::count(),
            'news' => News::count(),
            'tag' => Tag::count(),
            'story_today_view_count' => News::sum('view_count'),
            'stories' => News::orderBy('id', 'desc')->take(5)->get(),
            'user' => User::count(),
        ]);
    }
}
