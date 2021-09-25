@extends('backend.main_master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Post</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="{{ url('dashboard/post/update/'.$post->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        Title:
                                        <br>
                                        <input type="text" value="{{$post->title}}" class="form-control" name="title">
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group">
                                        Post Image
                                        <input type="file" class="form-control" name="image_path">
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group">
                                        Select Category(ies)
                                        <select type="text" name="categories[]" class="form-control" multiple>
                                            @foreach($categories as $category)
                                                <option
                                                    value="{{$category->id}}" {{\App\Models\CategoryPost::where('category_id',$category->id)->where('post_id',$post->id)?'selected':''}}>{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        Post subject :
                                        <input type="text" name="subject" class="form-control" value="{{$post->subject}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        Short description:
                                        <br>
                                        <textarea type="text" name="short_desc"
                                                  id="editor1">{!!  strip_tags($post->short_desc,["br","hr","image","b","i","div","span"]) !!}</textarea>
                                        @error('short_desc')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group">
                                        Long description:
                                        <br>

                                        <textarea type="text" name="long_desc"
                                                  id="editor2">{!!  strip_tags($post->long_desc,"<br><hr><image><b><i><div>") !!}</textarea>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary ml-4" value="Edit Post">
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
