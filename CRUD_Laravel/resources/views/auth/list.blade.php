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
                        <a href="{{ route('user.showPost', ['id' => $user->id]) }}">Xem Post</a>
                        <a href="{{ route('user.showFavorite', ['id' => $user->id]) }}">Xem Sở thích</a>
                    </th>
                </tr>
            @endforeach

            

        </table>
  </div>
@endsection
