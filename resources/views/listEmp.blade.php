@extends('layout')
@section('content')
@if (session('AddEmp'))
<div class="alert bg-my alert-dismissible fade show" role="alert">
  <strong>{{ session('AddEmp') }}!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('editEmp'))
<div class="alert bg-my alert-dismissible fade show" role="alert">
  <strong>{{ session('editEmp') }}!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('EmpDelete'))
<div class="alert bg-my alert-dismissible fade show" role="alert">
  <strong>{{ session('EmpDelete') }}!</strong>
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
      <th scope="col">Restaurant Shift</th>
      <th scope="col">Operation</th>
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
      <td>
        <a href="EmpEdit/{{ $item->id }}" class="fa fa-edit bg-my-text m-2"></a>
        <a href="EmpDelete/{{ $item->id }}" class="fa fa-trash bg-my-text m-2"></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection