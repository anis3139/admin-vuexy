<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Utlity;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.pages.category.index', [
            'prefixname' => 'Admin',
            'title' => 'Category List',
            'page_title' => 'Category List',
            'categories' => Category::latest()->get()
        ]);
    }

    public function create(){
        return view('admin.pages.category.create', [
            'prefixname' => 'Admin',
            'title' => 'Category Create',
            'page_title' => 'Category Create',
        ]);
    }

    public function store(Request $request){

        $rules = [
            'nameBn' => ['required', 'unique:categories'],
            'nameEn' => ['required', 'unique:categories'],
            'img'    => 'required'
        ];
        $this->validate($request, $rules);

        //upload photo
        if ($request->hasFile('img')){
            $path = Utlity::file_upload($request,'img','Category_Photo');
        }
        else {
            $path = null;
        }
        $category = new Category();
        $category->nameBn = $request->get('nameBn');
        $category->nameEn = $request->get('nameEn');
        $category->description = $request->get('description');
        $category->image = $path;
        $category->status = $request->status;
        if ($category->save()) {

            return redirect()->route('category.create')->with('success', 'Data Added successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on create');
    }

    public function edit($id){
        return view('admin.pages.category.edit', [
            'prefixname' => 'Admin',
            'title' => 'Category Edit',
            'page_title' => 'Category Edit',
            'category' => Category::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id){
        $rules = [
            'nameBn' => 'required|unique:categories,nameBn,'.$request->id,
            'nameEn' => 'required|unique:categories,nameEn,'.$request->id,
        ];
        $this->validate($request, $rules);
        $category = Category::findOrFail($id);
        $category->nameBn = $request->get('nameBn');
        $category->nameEn = $request->get('nameEn');
        $category->description = $request->get('description');
        $path = null;
        if($request->hasFile('img')){
            if(file_exists($category->image)){
                unlink($category->image);
            }
            $path = Utlity::file_upload($request,'img','Category_Photo');
            $category->image = $path;
        }
        $category->status = $request->status;
        if ($category->save()) {

            return redirect()->route('category.edit', $category->id)->with('success', 'Data Updated successfully Done');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on update');
    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        if(file_exists($category->image)){
            unlink($category->image);
        }
        if($category->delete()){

            return redirect()->route('category.index')->with('success', 'Data Delete successfully');
        }
        return redirect()->back()->withInput()->with('failed', 'Data failed on deleting');

    }
}
