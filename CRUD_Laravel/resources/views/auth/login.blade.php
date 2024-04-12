@extends('dashboard')

@section('content')
    <main class="login-form">
        <div class="container_login">
            <h1 class="title_login">Login</h1>
            <form  method="POST" action="{{ route('user.authUser') }}">
                <!-- csrf token để của laravel để tránh các tấn công của hacker -->
                @csrf
                <div class="mb-3"> 
                    <input type="text" placeholder="Email" id="email" class="form-control" name="email" >
                </div>
                <div class="mb-3">
                    <input type="password" placeholder="Password" id="password" class="form-control" name="password" >
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
@endsection
