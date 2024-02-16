<style>
    img {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width: 150px;
    }
</style>
@extends('layout')
@section('content')
    <h1>Edit Restaurant</h1>
    <div class="col-sm-6">
        <form action="/edit" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $data->id }}">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="name" value="{{ $data->name }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email" value="{{ $data->email }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Address</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="address" value="{{ $data->address }}">
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Photo</label>
                <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="file">
            </div>
            <div class="rounded mb-2">
                <img src="{{asset('img/'.$data->file)}}" alt="" srcset="">
                <span class="lead">{{$data->file}}</span>
            </div>
            <button type="submit" class="btn bg-my text-dark fw-bolder border">Submit</button>
        </form>
    </div>
@endsection
