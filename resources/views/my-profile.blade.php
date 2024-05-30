@extends('layouts.layout')

@section('title', 'My Profile')

@section('content')
<main>
    <div class="container-fluid content">
        <h2>My Profile</h2>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="wrapper mb-3">
                    <h4>{{ $UserInfo['name'] }}</h4>
                    <p>{{ $UserInfo['email'] }}<br>
                        {{ $UserInfo['phone'] }}</p>
                    <button type="button" class="btn btn-bd-primary w-100" data-bs-toggle="modal"
                        data-bs-target="#editProfileModal">
                        Edit
                    </button>
                    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileeModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editProfileModalLabel">Edit Profile</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('auth.edit') }}" method="post" class="p-3">
                                        @csrf
                                        @method('PATCH')
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control w-100" id="name" name="name"
                                                value="{{ $UserInfo['name'] }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control w-100" id="email" name="email"
                                                value="{{ $UserInfo['email'] }}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="tel" class="form-control w-100" id="phone" name="phone"
                                                value="{{ $UserInfo['phone'] }}" required>
                                        </div>
                                        <button type="button" class="btn btn-bd-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-bd-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="get" class="mb-3">
                    <button type="submit" class="btn btn-bd-secondary w-100">Logout</button>
                </form>
                @if(Session::get('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                @endif
                @if(Session::get('success'))
                    <div class="alert alert-success">
                        {!! Session::get('success') !!}
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <div class="wrapper">
                    <h4>Booking History</h4>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection