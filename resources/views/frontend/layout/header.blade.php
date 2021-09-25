@php
    $routeUrl = Request::route()->uri;

    $routePrefix = Request::route()->action['prefix'];
@endphp
<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.html"><h2>{{ \App\Models\Setting::find(1)->name }}<em>.</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{$routeUrl == '/'?'active':''}}">
                        <a class="nav-link" href="{{ url('/') }}">Home
                        </a>
                    </li>
                    <li class="nav-item {{ $routeUrl == 'posts/all' ?'active':''}}">
                        <a class="nav-link" href="{{ url('posts/all') }}">All Posts</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact/') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
