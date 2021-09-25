<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function Index()
    {
        $banner_posts = Post::withCount('comments')->where('status',1)->orderBy('comments_count','DESC')->latest()->take(6)->get();
        $top_posts = Post::latest()->take(3)->get();
        $recent_posts = Post::latest()->where('status',1)->take(6)->get();
        return view('frontend.home',compact('banner_posts','top_posts','recent_posts'));
    }

    public function AllPosts()
    {
        $posts = Post::where('status',1)->paginate(66);
        $recent_posts = Post::latest()->where('status',1)->take(6)->get();
        return view('frontend.all_posts',compact('posts','recent_posts'));
    }

    public function Contact()
    {
        $setting = Setting::find(1);
        return view('frontend.contact',compact('setting'));
    }

    public function SendContact(Request $request)
    {
        $request->validate([
            'name'=>['required','min:2','max:20'],
            'email'=> ['required','email'],
            'subject' => ['required','min:2','max:255'],
            'message' => ['required','min:5','max:500']
        ]);
        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message'=> $request->message
        ]);
        return Redirect::back()->with('success',"Message sent successfully");
    }

    public function PostIndex($id)
    {
        $post = Post::find($id);
        $recent_posts = Post::latest()->where('status',1)->take(6)->get();
        $comments = Comment::where('post_id',$id)->get();
        return view('frontend.post',compact('post','comments','recent_posts'));
    }

    public function SendComment(Request $request)
    {
        $request->validate([
            'name' => ['required','min:2','max:20'],
            'email' => ['required','email'],
            'post_id' => ['required'],
            'subject'=>['required','min:2','max:50'],
            'comment' => ['required','min:5',"max:500"]
        ]);
        Comment::create([
            'name'=> $request->name,
            'email' => $request->email,
            'post_id' => $request->post_id,
            'subject' => $request->subject,
            'comment' => $request->comment,

        ]);
        return Redirect::back()->with('success','Comment sent successfully');
    }
}
