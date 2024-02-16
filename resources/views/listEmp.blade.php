@extends('layout')
@section('content')
@if (session('AddEmp'))
<div class="alert bg-my alert-dismissible fade show" role="alert">
    <strong>{{ session('AddEmp') }}!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Restaurant Name</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $item) 
            <tr>
            <th scope="row">{{$item['id']}}</th>
            <td>{{$item['name']}}</td>
            <td>{{$item['email']}}</td>
            <td>{{$item['address']}}</td>
            <td>{{$item['restaurant']->name }}</td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection