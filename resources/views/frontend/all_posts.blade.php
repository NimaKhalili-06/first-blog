@extends('frontend.main_master')

@section('content')
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Recent Posts</h4>
                            <h2>Our Recent Blog Entries</h2>
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
                            @foreach($posts as $post)
                            <div class="col-lg-6">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="{{ asset($post->image_path) }}" alt="">
                                    </div>
                                    <div class="down-content">
                                        <span>Lifestyle</span>
                                        <a href="{{ url('post/'.$post->id) }}"><h4>{{ $post->title }}</h4></a>
                                        <ul class="post-info">
                                            <li><a href="#">{{ $post->user->name }}</a></li>
                                            <li><a href="#">{{ date('M d, Y',$post->created_at->timestamp) }}</a></li>
                                            <li><a href="#">{{ \App\Models\Comment::where('post_id',$post->id)->count() }} Comments</a></li>
                                        </ul>
                                        <p>{!!  strip_tags($post->short_desc,["br","hr","image","b","i","div","span"]) !!}</p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-lg-12">
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            {{ $posts->links('frontend.layout.paginator') }}
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
