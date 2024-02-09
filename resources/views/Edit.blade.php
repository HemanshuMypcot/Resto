@extends('layout')
@section('content')
<h1>Edit Restaurant</h1>
<div class="col-sm-6">
    <form action="/edit" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{$data->name}}">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{$data->email}}">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Address</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address" value="{{$data->address}}">
        </div>
        <button type="submit" class="btn bg-my text-dark fw-bolder border">Submit</button>
      </form>
</div>
@endsection