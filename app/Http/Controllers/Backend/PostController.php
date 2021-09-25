<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function Index()
    {
        $posts = Post::all();
        return view('backend.post.post_all', compact('posts'));
    }

    public function Create()
    {
        $categories = Category::all();
        return view('backend.post.post_add', compact('categories'));
    }

    public function Insert(Request $request)
    {
        $request->validate([
            'title' => ['required','min:3','max:225'],
            'short_desc' => ['required', 'min:5', 'max:255'],
            'categories' => ['required'],
            'image_path' => ['mimes:jpg,png,jpeg'],
            'subject' => ['required']
        ]);

        if ($request->file('image_path')) {
            $image = $request->file('image_path');

            $imageUrl = 'storage/post_images/' . hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(770, 340)->save($imageUrl);
            $post = Post::create([
                'user_id' => Auth::id(),
                'title'=> $request->title,
                'subject' => $request->subject,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'image_path' => $imageUrl,
                'status' => 1
            ]);
        } else {
            $post = Post::create([
                'user_id' => Auth::id(),
                'title'=> $request->title,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'status' => 1
            ]);
        }
        foreach ($request->categories as $category) {
            CategoryPost::create([
                'post_id' => $post->id,
                'category_id' => $category
            ]);
        }
        return Redirect('dashboard/post/all')->with('Post Inserted Successfully');

    }

    public function Edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('backend.post.post_edit', compact('post', 'categories'));
    }

    public function Update($id, Request $request)
    {
        $request->validate([
            'long_desc' => ['required','min:5'],
            'title' =>['required', 'min:2', 'max:255'],
            'short_desc' => ['required', 'min:5', 'max:1000'],
            'categories' => ['required'],
            'image_path' => ['mimes:jpg,png,jpeg']
        ]);
        $post = Post::find($id);
        if ($request->file('image_path')) {
            $image = $request->file('image_path');
            $imageUrl = 'storage/post_images/' . hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(770, 340)->save($imageUrl);
            unlink($post->image_path);
            $post->update([
                'short_desc' => $request->short_desc,
                'title'=> $request->title,
                'subject' => $request->subject,
                'long_desc'  => $request->long_desc,
                'image_path' => $imageUrl,
                'user_id' => Auth::id(),
                'status' => 1
            ]);
        }else {
            $post->update([
                'user_id' => Auth::id(),
                'title'=> $request->title,
                'subject' => $request->subject,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'status' => 1
            ]);
        }
        return Redirect('dashboard/post/all')->with('success',"Post Updated Successfully");
    }

    public function Delete($id)
    {
        $image = Post::find($id)->image_path;
        if ($image) {
            unlink($image);
        }
        Post::find($id)->delete();
        return Redirect::back()->with('success', 'Post Deleted Successfully');
    }

    public function ToggleActive($id)
    {
        $post = Post::find($id);
        if ($post->status == 0) {
            $post->status = 1;
            $post->save();
            return Redirect::back()->with('success', 'Post Active Successfully');
        } else {
            $post->status = 0;
            $post->save();
            return Redirect::back()->with('success', 'Post InActive Successfully');
        }
    }
}
