@extends('layouts.layout')

@section('title', 'Sign Up')

@section('content')
<main class="d-flex align-items-center justify-content-center">
    <div class="w-25">
        <h2 class="mb-4 text-center">Sign Up</h2>
        <form action="{{route('auth.save')}}" method="post">
        @if(Session::get('success'))
        <div class="alert alert-success">
            {!! Session::get('success') !!}
        </div>
        @endif
        
        @if(Session::get('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
        @endif

        @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control w-100" id="name" name="name"
                    placeholder="Enter full name" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control w-100" id="email" name="email"
                    placeholder="Enter your email address" value="{{ old('email') }}" required>
                <span class="text-danger">@error('email') {{$message}} @enderror</span>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control w-100" id="phone" name="phone"
                    placeholder="Enter phone number" value="{{ old('phone') }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control w-100" id="password" name="password"
                    placeholder="Enter password" required>
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-bd-primary w-100">Sign Up</button>
            </div>
        </form>
        <span><small>Already have an account? <a href="{{route('login')}}">Login</a></small></span>
    </div>
</main>
@endsection