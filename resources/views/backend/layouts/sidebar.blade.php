@php
    $routeUrl = Request::route()->uri;

    $routePrefix = Request::route()->action['prefix'];
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
                        <h3><b>Sunny</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{$routeUrl == 'dashboard'?'active':''}}">
                <a href="index.html" >
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview {{$routePrefix == 'dashboard/post'?'active':''}}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Posts</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{$routeUrl == 'dashboard/post/all'?'active':''}}"><a href="{{url('dashboard/post/all')}}"><i class="ti-more"></i>All Posts</a></li>
                    <li class="{{$routeUrl == 'dashboard/post/add'?'active':''}}"><a href="{{url('dashboard/post/add')}}"><i class="ti-more"></i>Add Post</a></li>
                </ul>
            </li>
            <li class="{{$routePrefix == 'dashboard/category'?'active':''}}">
                <a href="{{ url('dashboard/category') }}">
                    <i data-feather="tag"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li class="{{$routeUrl == 'dashboard/comment'?'active':''}}">
                <a href="{{ url('dashboard/comment') }}">
                    <i data-feather="message-circle"></i>
                    <span>Comments</span>
                </a>
            </li>
            <li class="{{$routeUrl == 'dashboard/message'?'active':''}}">
                <a href="{{ url('dashboard/message') }}">
                    <i data-feather="mail">
                    </i>
                        <span>Messages</span>
                </a>
            </li>
            <li class="{{$routeUrl == 'dashboard/setting'?'active':''}}">
                <a href="{{ url('dashboard/setting') }}">
                    <i data-feather="settings"></i>
                    <span>Setting</span>
                </a>
            </li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="{{ url('dashboard/setting') }}" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
           aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="{{ url('dashboard/message') }}" class="link" data-toggle="tooltip" title="" data-original-title="Messages"><i
                class="ti-email"></i></a>
        <!-- item-->
        <a href="{{ url('dashboard/logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                class="ti-lock"></i></a>
    </div>
</aside>
