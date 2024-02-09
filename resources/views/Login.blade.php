@extends('layout')
@section('content')
    <h1>Login</h1>
    @if (session('Error'))
        <div class="alert bg-my alert-dismissible fade show" role="alert">
            <strong>{{ session('Error') }}!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('logout'))
        <div class="alert bg-my alert-dismissible fade show" role="alert">
            <strong>{{ session('logout') }}!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('register'))
        <div class="alert bg-my alert-dismissible fade show" role="alert">
            <strong>{{ session('register') }}!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="col-sm-6">
        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="username" value="{{old('username')}}">
                @error('username')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="{{old('username')}}">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn bg-my text-dark fw-bolder">Submit</button>
        </form>
    </div>
@endsection
