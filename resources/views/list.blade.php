<style>

</style>
@extends('layout')
@section('content')
<style>
    .ban {
        color: red;
        font-weight: bolder;
        margin-left: 25px;
        text-decoration: none;
        font-size: 19px;
    }

    img {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width: 150px;
    }


    .ban:hover {
        color: red;
    }

    .log {
        color: green;
        font-weight: bolder;
        margin-left: 25px;
        text-decoration: none;
        font-size: 19px;
    }

    .log:hover {
        color: green;
    }

    .srh {
        color: royalblue;
        font-weight: bolder;
        margin-left: 15px;
        text-decoration: none;
        font-size: 30px;
    }

    .srh:hover {
        color: royalblue
    }

    .w-5 {
        display: none;
    }
</style>

<h1>Restaurant List <a class="fa fa-search srh " href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"></a>
</h1>
@if (session('Add'))
<div class="alert bg-my alert-dismissible fade show" role="alert">
    <strong>{{ session('Add') }}!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('edit'))
<div class="alert bg-my alert-dismissible fade show" role="alert">
    <strong>{{ session('edit') }}!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('delete'))
<div class="alert bg-my alert-dismissible fade show" role="alert">
    <strong>{{ session('delete') }}!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('login'))
<div class="alert bg-my alert-dismissible fade show" role="alert">
    <strong>{{ session('login') }}!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<table class="table table-hover shadow p-3 mb-5 bg-body rounded">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Pic</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Operation</th>
            <th scope="col">Added By</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        @if (session('name') == $item->user_name && session('showNav') != false)
        <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>
                <img src="{{ asset('img/' . $item->file) }}" class="img-fluid" alt="">
            </td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->address }}</td>
            <td>
                <a href="edit/{{ $item->id }}" class="fa fa-edit bg-my-text m-2"></a>
                <a href="delete/{{ $item->id }}" class="fa fa-trash bg-my-text m-2"></a>
                <a href="showEmp/{{ $item->id }}" class="fa fa-users bg-my-text m-2"></a>
            </td>
            <td style="font-family: 'Protest Riot', sans-serif;">{{ $item->user_name }}</td>
        </tr>
        @elseif(session('showNav') != true)
        <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>
                <img src="{{ asset('img/' . $item->file) }}" class="img-fluid" alt="">
            </td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->address }}</td>
            <td>
                <a href="/login" class="fa fa-ban log fa-sign-in"></a>
            </td>
            <td style="font-family: 'Protest Riot', sans-serif;">{{ $item->user_name }}</td>
        </tr>
        @else
        <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>
                <img src="{{ asset('img/' . $item->file) }}" class="img-fluid" alt="">
            </td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->address }}</td>
            <td>
                <a class="fa fa-ban ban" id="show"></a>
            </td>
            <td style="font-family: 'Protest Riot', sans-serif;">{{ $item->user_name }}</td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
<p class="col-sm-6 d-flex align-item-center">{{ $data->links() }}</p>
@endsection