<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Deviceinformation;
use App\Models\News;
use App\Models\Subcategory;
use App\Models\Tag;
use App\Utlity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.pages.news.list', [
            'prefixname' => 'Admin',
            'title' => 'News List',
            'page_title' => 'News List',
            'news' => News::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.pages.news.add', [
            'prefixname' => 'Admin',
            'title' => 'News Create',
            'page_title' => 'News Create',
            'categories' => Category::where('status', 1)->get(),
            'subcategories' => Subcategory::where('status', 1)->get(),
            'tags' => Tag::where('status', 1)->latest()->get(),
        ]);
    }

    public function store(Request $request)
    {

        //dd($request->all());
        $rules = [
            'category' => 'required',
            //            'subcategory' => 'required',
            //            'tag' => 'required',
            'title' => ['required', 'unique:news'],
            'description' => 'required',
            //            'img' => 'required',
        ];
        $this->validate($request, $rules);

        //upload photo
        if ($request->hasFile('img')) {
            $path = Utlity::file_upload($request, 'img', 'News_Photo');
        } else {
            $path = null;
        }
        $news = new News();
        $news->user_id = Auth::user()->id;
        $news->category_id = $request->get('category');
        $news->subcategory_id = $request->get('subcategory');
        $news->tag_id = $request->get('tag');
        $news->title = $request->get('title');
        $news->titleEn = $request->get('titleEn');
        $news->description = $request->get('description');
        $news->descriptionEn = $request->get('descriptionEn');
        $news->image = $path;
        if ($news->save()) {

            //            for send notification
            $url = 'https://fcm.googleapis.com/fcm/send';
            $token = 'AAAAP2tmdKA:APA91bGP3kyE1X9cE71mPKZ4nOpQR_dNX3vwmfgXxoF3mLAtin5GWnHhs3UantDTh1t90tSbeotCei7e7-htxdlezpJdC0wMsLZ-2Z_aKBHlc1tn4egFlWJlEKFjsbKbT7BJ36QkAbaX';
            $firebaseToken = Deviceinformation::whereNotNull('device_token')->pluck('device_token')->all();
            $data = News::with('category')->latest()->first();
            $fields = [
                "registration_ids" => $firebaseToken,
                "notification" => [
                    "title" => $data->title,
                    "body" => \Illuminate\Support\Str::limit($data->description, 35, '...'),
                ]
            ];

            $headers = array(
                'Content-Type: application/json',
                'Authorization:key = ' . $token

            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(
                $fields
            ));
            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('Curl failed :' . curl_error($ch));
            }
            curl_close($ch);

            return redirect()->route('news.create')->with(['success' => 'Data Added successfully Done', 'result' => $result]);
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function view($id)
    {
        return view('admin.pages.news.view', [
            'prefixname' => 'Admin',
            'title' => 'News View',
            'page_title' => 'News View',
            'news' => News::findOrFail($id),
        ]);
    }

    public function edit($id)
    {
        return view('admin.pages.news.edit', [
            'prefixname' => 'Admin',
            'title' => 'News Edit',
            'page_title' => 'News Edit',
            'news' => News::findOrFail($id),
            'categories' => Category::where('status', 1)->get(),
            'subcategories' => Subcategory::where('status', 1)->get(),
            'tags' => Tag::where('status', 1)->latest()->get(),
        ]);
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'category' => 'required',
            //            'subcategory' => 'required',
            //            'tag' => 'required',
            'title' => 'required|unique:news,title,' . $request->id,
            'description' => 'required',
        ];
        $this->validate($request, $rules);


        $news = News::findOrFail($id);
        $news->user_id = Auth::user()->id;
        $news->category_id = $request->get('category');
        $news->subcategory_id = $request->get('subcategory');
        $news->tag_id = $request->get('tag');
        $news->title = $request->get('title');
        $news->titleEn = $request->get('titleEn');
        $news->description = $request->get('description');
        $news->descriptionEn = $request->get('descriptionEn');
        $path = null;
        if ($request->hasFile('img')) {
            if (file_exists($news->image)) {
                unlink($news->image);
            }
            $path = Utlity::file_upload($request, 'img', 'News_Photo');
            $news->image = $path;
        }
        $news->status = $request->status;
        if ($news->save()) {
            return redirect()->route('news.edit', $news->id)->with('success', 'Data Updated successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        if (file_exists($news->image)) {
            unlink($news->image);
        }
        if ($news->delete()) {
            return redirect()->route('news.index')->with('success', 'Data Delete successfully');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on deleting');
    }
}
