
@extends('layout')
@section('content')
    <h1>Add Employee</h1>
    <div class="col-sm-6">
        <form action="/addEmp" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{old('name')}}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email" value="{{old('email')}}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Address</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="address" value="{{old('address')}}">
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Choose Restaurant</label>
                <select name="resto_id" id="resto_id" class="form-control" required>
                    <option value="Select" disabled selected>Select Restaurant</option>
                    @foreach ($data as $item)
                        <option value="{{$item->id}}" name="resto_id">{{$item->name}}</option>      
                    @endforeach
                </select>
            </div>
            <input type="hidden" value="{{session('name')}}" name="user_name">
            <button type="submit" class="btn bg-my text-dark fw-bolder border">Submit</button>
        </form>
    </div>
@endsection
