@extends('backend.main_master')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-7">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Categories</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Category title</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($categories as $item)

                                    <tr>
                                        <td>{{ $item->title }}</td>

                                        <td>
                                            <a href="{{route('category.edit',['id'=>$item->id])}}"
                                               title="edit category" class="btn btn-info"><i
                                                    class="fa fa-pencil"></i></a>
                                            <a href="{{route('category.delete',['id'=>$item->id])}}"
                                               class="btn btn-danger" title="delete category"><i
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
            <div class="col-lg-5">
                <div class="box">
                    <div class="box-header with-border"><h3 class="box-title">Add New Category</h3></div>
                    <div class="box-body">
                        <form action="{{ url('dashboard/category/insert') }}" method="POST">
                            <div class="form-group">
                                @csrf
                                Category title:
                                <input type="text" name="title" class="form-control">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Add Category">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
