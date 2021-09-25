@php
    $adminData = \Illuminate\Support\Facades\Auth::user()
@endphp
@extends('backend.main_master')
@section('content')
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <section class="content col-12">

                    <!-- Basic Forms -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Update profile</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="POST" action="{{url('dashboard/profile/update')}}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="form-group col-md-6 col-sm-12">
                                                        <h5>Admin user name</h5>
                                                        <input type="text" value="{{ $adminData->name }}" name="name"
                                                               class="form-control "
                                                               data-validation-required-message="This field is required"
                                                               aria-invalid="false">
                                                        @error('name')
                                                        <div class="text-danger">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6 col-sm-12">
                                                        <h5>Admin Email</h5>
                                                        <div class="controls">
                                                            <input type="email" value="{{ $adminData->email }}"
                                                                   name="email" class="form-control "
                                                                   data-validation-required-message="This field is required"
                                                                   aria-invalid="false">
                                                            @error('email')
                                                            <div class="text-danger">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-6 col-sm-12">
                                                        <h5>profile image</h5>
                                                        <div class="controls">
                                                            <input type="file" id="image_file" onchange="readURL(this)"
                                                                   name="profile_photo_path"
                                                                   class="form-control ">
                                                            @error('profile_photo_path')
                                                            <div class="text-danger">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <img id="image_show"
                                                         src="{{ isset($adminData->profile_photo_path)? asset($adminData->profile_photo_path):asset('backend/images/No-image.jpg') }}"
                                                         style="width: 100px;height:100px" alt="">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-rounded btn-info">Update</button>
                            </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
            </div>
            <!-- /.box-body -->
    </div>
    <!-- /.box -->

    </section>
    </div>
    </section>
    <!-- /.content -->
    </div>
    <script>

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image_show').attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
