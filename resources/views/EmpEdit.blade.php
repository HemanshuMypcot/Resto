@extends('layout')
@section('content')
<h1>Edit Employee</h1>
<div class="col-sm-6">
    <form action="/EditEmp" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name"
                value="{{$data->name}}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
                value="{{$data->email}}">
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Address</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address"
                value="{{$data->address}}">
            @error('address')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Choose Restaurant</label>
            <select name="resto_id" id="resto_id" class="form-control" required>
                <option value="Select" disabled selected>Select Restaurant</option>
                @foreach($restaurants as $restaurant)
                <option value="{{ $restaurant->id }}" {{ $data->resto_id == $restaurant->id ? 'selected' : '' }} name="resto_id">
                    {{ $restaurant->name }}
                </option>
                @endforeach
            </select>
        </div>
        <input type="hidden" value="{{session('name')}}" name="user_name">
        <button type="submit" class="btn bg-my text-dark fw-bolder border">Submit</button>
    </form>
</div>
@endsection