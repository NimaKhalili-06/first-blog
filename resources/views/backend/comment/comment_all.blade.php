@extends('backend.main_master')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Comments</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Post_name</th>
                                    <th>Author name</th>
                                    <th>Author email</th>
                                    <th>Subject</th>
                                    <th>Comment</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($comments as $item)

                                    <tr>
                                        <td>{{ $item->post->title }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->comment }}</td>
                                        <td>
                                            <a href="{{route('comment.delete',['id'=>$item->id])}}"
                                               class="btn btn-danger" title="delete comment"><i
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
