@extends('backend.main_master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Change Setting</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ url('dashboard/setting/update') }}" method="POST">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        @csrf
                                        Blog name :
                                        <input type="text" name="name" value="{{$setting->name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        Blog title :
                                        <input type="text" value="{{$setting->title}}" name="title" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        Blog phone :
                                        <input type="text" value="{{$setting->phone}}" name="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        Blog email :
                                        <input type="text" value="{{$setting->email}}" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        Blog address
                                        <textarea name="address" class="form-control" id="" cols="30" rows="3">{{$setting->address}}</textarea>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary ml-4" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
