@extends('frontend.main_master')
@section('content')

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text">
        <div class="container-fluid">
            <div class="owl-banner owl-carousel">
                @foreach($banner_posts as $banner_post)
                    <div class="item">
                        <img src="{{ $banner_post? asset($banner_post->image_path):'https://picsum.photos/200/300'}}"
                             alt="">
                        <div class="item-content">
                            <div class="main-content">
                                <div class="meta-category">
                                    <span>{{ $banner_post->subject }}</span>
                                </div>
                                <a href="{{ url("post/$banner_post->id") }}"><h4>{{ $banner_post->title }}</h4></a>
                                <ul class="post-info">
                                    <li><a href="#">{{ $banner_post->user->name }}</a></li>
                                    <li><a href="#">{{ date('M d, Y',$banner_post->created_at->timestamp) }}</a></li>
                                    <li>
                                        <a href="#">{{ \App\Models\Comment::where('post_id',$banner_post->id)->count() }}
                                            Comments</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Banner Ends Here -->

    <section class="blog-posts">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                            @foreach($top_posts as $top_post)
                                <div class="col-lg-12">
                                    <div class="blog-post">
                                        <div class="blog-thumb">
                                            <img src="{{asset($top_post->image_path)}}" alt="">
                                        </div>
                                        <div class="down-content">
                                            <span>{{ $top_post->subject }}</span>
                                            <a href="{{ url("post/$top_post->id") }}"><h4>{{ $top_post->title }}</h4></a>
                                            <ul class="post-info">
                                                <li><a href="#">{{ $top_post->user->name }}</a></li>
                                                <li><a href="#">{{ date('M d, Y',$top_post->created_at->timestamp) }}</a></li>
                                                <li><a href="#">{{ \App\Models\Comment::where('post_id',$top_post->id)->count() }} Comments</a></li>
                                            </ul>
                                            <p>{!!  strip_tags($top_post->short_desc,["br","hr","image","b","i","div","span"]) !!}</p>
                                            <div class="post-options">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-tags"></i></li>
                                                            @php($category_count = \App\Models\CategoryPost::where('post_id',$top_post->id)->count())
                                                            @php($i = 0)
                                                            @foreach(\App\Models\CategoryPost::where('post_id',$top_post->id)->get() as $item)
                                                            <li><a href="#">{{\App\Models\Category::find($item->category_id)->title }}</a>{{$i<$category_count-1 ? ',' : ''}}</li>
                                                                @php($i++)
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="col-6">
                                                        <ul class="post-share">
                                                            <li><i class="fa fa-share-alt"></i></li>
                                                            <li><a href="#">Facebook</a>,</li>
                                                            <li><a href="#">Twitter</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            <div class="col-lg-12">
                                <div class="main-button">
                                    <a href="{{ url('posts/all') }}">View All Posts</a>
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
                                        <input type="text" name="q" class="searchText" placeholder="type to search..."
                                               autocomplete="on">
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
