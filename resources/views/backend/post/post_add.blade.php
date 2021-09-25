@extends('backend.main_master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Post</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="{{ url('dashboard/post/insert') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        Title:
                                        <br>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        Subject:
                                        <input type="text" name="subject" class="form-control" id="">
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group">
                                        Post Image:
                                        <input type="file" class="form-control" name="image_path">
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group">
                                        Select Category(ies):
                                        <select type="text" name="categories[]" class="form-control" multiple>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class=" col-md-6">

                                    <div class="form-group">
                                        Short description:
                                        <br>
                                        <textarea type="text" name="short_desc" id="editor1"></textarea>
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group">
                                        Long description:
                                        <br>
                                        <textarea type="text" name="long_desc" id="editor2"></textarea>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary ml-4" value="Add Post">
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        </div>
    </section>
@endsection
