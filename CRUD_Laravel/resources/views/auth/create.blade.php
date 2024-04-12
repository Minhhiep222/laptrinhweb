@extends('dashboard')

@section('content')
    <main class="signup-form">
    <div class="container_signup">
        <form class="row g-3" method="POST" action="{{ route('user.postUser') }}">
          @csrf
            <h1>Register</h1>
            <div class="col-12">
              <label for="inputAddress2" class="form-label">Name</label>
              <input type="text" class="form-control" id="inputAddress2" name="name" placeholder="">
            </div>
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" class="form-control" id="inputEmail4" name="email">
            </div>
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Phone</label>
              <input type="text" class="form-control" id="" name="phone">
            </div>
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Img</label>
              <input type="file" class="form-control" id="" name="img">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Password</label>
              <input type="password" class="form-control" id="inputPassword4" name="password">
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Check me out
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
          </form>
    </div>
    </main>
@endsection
