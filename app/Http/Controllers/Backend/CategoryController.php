<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function Index()
    {
        $categories = Category::all();
        return view('backend.category.category_all',compact('categories'));
    }

    public function Insert(Request $request)
    {
        $request->validate([
            'title'=> ['required','min:2','max:50']
        ]);
         Category::create([
             'title'=>$request->title,
             'category_url'=> strtolower(str_replace(' ','-',$request->title))
         ]);
         return Redirect::back()->with('success','Category Insert successfully');
    }

    public function Edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));
    }

    public function Update($id,Request $request)
    {
        $request->validate([
            'title'=> ['required','min:2','max:50']
        ]);
        Category::findOrFail($id)->update([
            'title'=>$request->title,
            'category_url'=> strtolower(str_replace(' ','-',$request->title))
        ]);
        return Redirect('dashboard/category')->with('success','Category Update Successfully');
    }

    public function Delete($id)
    {
        Category::find($id)->delete();
        return Redirect::back()->with('success',"Category Delete Successfully");
    }
}
