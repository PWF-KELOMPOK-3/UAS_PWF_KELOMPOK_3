@extends('layouts.app')

@section('content')
<body class="bg-light">

  <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card shadow-lg" style="width: 100%; max-width: 350px;">
      <div class="card-body">
        <h2 class="text-center mb-4">Login</h2>
        
        <!-- Menampilkan error jika ada -->
        @if(session('error'))
          <div class="alert alert-danger">
            {{ session('error') }}
          </div>
        @endif

        <!-- Form login yang sesuai dengan route login -->
        <form action="{{ url('/login') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
          </div>
          <button style="margin-top: 10px;" type="submit" class="btn btn-success btn-block">Login</button>
        </form>
      </div>
    </div>
  </div>

@endsection
