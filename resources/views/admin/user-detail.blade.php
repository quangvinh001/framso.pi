@extends('admin.layout.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-1-12">
            <h1 style="color : red">User detail</h1>
            </div>
        </div>
        <div class="row">
            <ul>
                <li><img src="/build/images/{{ $user->image }}" alt=""
                    style="width: 120px;"></a></li>
                <li>Full Name:{{$user->name}}</li>
                <li>Phone: {{$user->phone}}</li>
                <li>Address:{{$user->address}}</li>
                <li>Level:{{$role->name}}</li>
        </div>
    </div>
    @endsection