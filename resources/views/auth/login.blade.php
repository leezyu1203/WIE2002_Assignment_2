@extends('layouts.layout')

@section('title', 'Login')

@section('content')
<main class="d-flex align-items-center justify-content-center">
    <div class="w-25">
        <h2 class="mb-4 text-center">Login</h2>
        <form action="{{route('auth.check')}}" method="post">
        @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>
        @endif

        @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control w-100" id="email" name="email"
                    placeholder="Enter your email address" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control w-100" id="password" name="password"
                    placeholder="Enter password" required>
                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-bd-primary w-100">Login</button>
            </div>
        </form>
        <span><small>Don't have an account? <a href="{{route('sign-up')}}">Sign Up</a></small></span>
    </div>
</main>
@endsection