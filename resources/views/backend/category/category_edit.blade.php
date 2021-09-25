@extends('backend.main_master')

@section('content')
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-6 col-xl-4">
                <div class="box">
                    <div class="box-header with-border"><h3 class="box-title">Edit Category</h3></div>
                    <div class="box-body">
                        <form action="{{ url('dashboard/category/update/'.$category->id) }}" method="POST">
                                <h4>Category title:</h4>
                            <div class="input-group">
                                @csrf
                                <input type="text" value="{{$category->title}}" name="title" class="form-control">
                                <div class="input-group-append">
                                    <input type="submit"  class="btn btn-primary" value="Add Category">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
