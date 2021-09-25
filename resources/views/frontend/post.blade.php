@extends('frontend.main_master')

@section('content')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Post Details</h4>
                            <h2>Single blog post</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Banner Ends Here -->

    <section class="blog-posts grid-system">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="{{ asset($post->image_path) }}" alt="">
                                    </div>
                                    <div class="down-content">
                                        <span>{{ $post->subject }}</span>
                                        <a href="{{ url("post/$post->id") }}"><h4>{{ $post->title }}</h4></a>
                                        <ul class="post-info">
                                            <li><a href="#">{{ $post->user->name }}</a></li>
                                            <li><a href="#">{{ date('M d, Y',$post->created_at->timestamp) }}</a></li>
                                            <li><a href="#">{{ \App\Models\Comment::where('post_id',$post->id)->count() }} Comments</a></li>
                                        </ul>
                                        <p>{!!  strip_tags($post->short_desc,["br","hr","image","b","i","div","span"]) !!}</p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-tags"></i></li>
                                                        @php($category_count = \App\Models\CategoryPost::where('post_id',$post->id)->count())
                                                        @php($i = 0)
                                                        @foreach(\App\Models\CategoryPost::where('post_id',$post->id)->get() as $item)
                                                            <li><a href="#">{{\App\Models\Category::find($item->category_id)->title }}</a>{{$i<$category_count-1 ? ',' : ''}}</li>
                                                            @php($i++)
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-6">
                                                    <ul class="post-share">
                                                        <li><i class="fa fa-share-alt"></i></li>
                                                        <li><a href="#">Facebook</a>,</li>
                                                        <li><a href="#"> Twitter</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item comments">
                                    <div class="sidebar-heading">
                                        <h2>4 comments</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @foreach($comments as $comment)
                                                <li>
                                                    <div class="author-thumb">
                                                        <img src="{{asset('frontend/assets/images/comment-author-01.jpg')}}" alt="">
                                                    </div>
                                                    <div class="right-content">
                                                        <h4>{{ $comment->name }}<span>{{ date('M d, Y',$comment->created_at->timestamp) }}</span></h4>
                                                        <p>{{ $comment->comment }}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item submit-comment">
                                    <div class="sidebar-heading">
                                        <h2>Your comment</h2>
                                    </div>
                                    <div class="content">
                                        <form id="comment" action="{{ url('comment/send') }}" method="post">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <fieldset>
                                                        @csrf
                                                        <input type="hidden" value="{{ $post->id }}" name="post_id">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <input name="name" type="text" id="name" placeholder="Your name" required="">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <fieldset>
                                                        @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <input name="email" type="text" id="email" placeholder="Your email" required="">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <fieldset>
                                                        @error('subject')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <input name="subject" type="text" id="subject" placeholder="Subject">
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        @error('message')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <textarea name="comment" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <button type="submit" id="form-submit" class="main-button">Submit</button>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sidebar-item search">
                                    <form id="search_form" name="gs" method="GET" action="#">
                                        <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item recent-posts">
                                    <div class="sidebar-heading">
                                        <h2>Recent Posts</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @foreach($recent_posts as $item)
                                                <li><a href="{{ url('post/'.$item->id) }}">
                                                        <h5>{{ $item->title }}</h5>
                                                        <span>{{date('M d, Y',$item->created_at->timestamp)}}</span>
                                                    </a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item categories">
                                    <div class="sidebar-heading">
                                        <h2>Categories</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @foreach(\App\Models\Category::all() as $category)
                                                <li><a href="#">- {{ $category->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
