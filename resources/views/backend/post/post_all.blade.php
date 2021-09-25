@extends('backend.main_master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Posts</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Subject</th>
                                    <th>Short_description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($posts as $item)

                                    <tr>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->short_desc }}</td>
                                        <td><img src="{{ asset($item->image_path) }}" style="width: 70px;height: 40px;"
                                                 alt=""></td>
                                        <td>@if ($item->status == 1 )
                                                <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td width="15%">

                                            <a href="{{ url('dashboard/post/toggle/'.$item->id) }}"
                                               title="
                                                @if ($item->status == 1 )
                                                   inactive post" class="btn btn-danger">
                                                    <i class="fa fa-arrow-down"></i>
                                                @else
                                                    active post" class="btn btn-success">
                                                    <i class="fa fa-arrow-up"></i>
                                                @endif
                                            </a>



                                            <a href="{{ route('post.edit',['id'=> $item->id]) }}" title="edit post" class="btn btn-info"><i
                                                    class="fa fa-pencil"></i></a>
                                            <a href="{{route('post.delete',['id'=>$item->id])}}"
                                               class="btn btn-danger" title="delete post"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>


                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>

@endsection
