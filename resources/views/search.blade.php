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
    .bk{
        color: royalblue;
        font-weight: bolder;
        /* margin-left: 15px; */
        text-decoration: none;
        font-size: 34px;
    }.bk:hover {
        color: royalblue
    }
</style>
@if(isset($message))
    {{-- <p>{{ $message }}</p> --}}
    <div class="container py-4">
        <div class="p-5 mb-4 bg-light rounded-3">
          <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">{{$message}}</h1>
            <a href="/list" class="btn bg-my btn-lg mt-3" type="button">Back to List</a>
          </div>
        </div>
      </div>
@else
<h1 class="display-5 fw-bold"><a href="/list" class="fa fa-arrow-left bk"></a> Results: </h1>
    <table class="table table-hover shadow p-3 mb-5 bg-body rounded">
        <thead>
            <tr>
                <th scope="col">ID</th>
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
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            <a href="edit/{{ $item->id }}" class="fa fa-edit bg-my-text m-2"></a>
                            <a href="delete/{{ $item->id }}" class="fa fa-trash bg-my-text m-2"></a>
                        </td>
                        <td style="font-family: 'Protest Riot', sans-serif;">{{ $item->user_name }}</td>
                    </tr>
                @elseif(session('showNav') != true)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
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
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            <a class="fa fa-ban ban"></a>
                        </td>
                        <td style="font-family: 'Protest Riot', sans-serif;">{{ $item->user_name }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    @endif
    @endsection