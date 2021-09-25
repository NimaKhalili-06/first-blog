@extends('backend.main_master')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Setting</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Blog name</th>
                                <th scope="col">Title</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Address</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$setting->name}}</td>
                                <td>{{$setting->title}}</td>
                                <td>{{$setting->phone}}</td>
                                <td>{{$setting->email}}</td>
                                <td>{{$setting->address}}</td>
                                <td><a href="{{ url('dashboard/setting/edit') }}" class="btn btn-primary">Update setting</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
