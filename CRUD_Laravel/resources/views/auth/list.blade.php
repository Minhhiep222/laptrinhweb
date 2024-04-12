@extends('dashboard')

@section('content')
    <div class="container">
        <h2>List Users</h2>
        <table>
            <tr>
                <th>Id</th>
                <th>Img</th>
                <th>User</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <th>
                        <img src="{{ asset('img/'. $user->img ) }}" alt="{{ $user->img }}">
                    </th>
                    <th>{{ $user->name }}</th>
                    <th>{{ $user->email }}</th>
                    <th>{{ $user->phone }}</th>
                    <th>
                        <a href="{{ route('user.readUser', ['id' => $user->id]) }}">View</a> |
                        <a href="{{ route('user.updateUser', ['id' => $user->id]) }}">Edit</a> |
                        <a href="{{ route('user.deleteUser', ['id' => $user->id]) }}">Delete</a>
                    </th>
                </tr>
            @endforeach

        </table>
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="{{ $users->previousPageUrl() }}">Previous</a></li>
            @foreach (range(1, $pages) as $page)
                <a class="page-link" href="{{route('user.list',['page' => $page])}}">{{ $page }}</a>
            @endforeach
       
            <li class="page-item"><a class="page-link" href="{{ $users->nextPageUrl() }}">Next</a></li>
        </ul>
  </div>
@endsection
