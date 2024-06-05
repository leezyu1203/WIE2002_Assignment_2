@extends('layouts.layout')

@section('title', 'Room Booking', 'Booking - ' . $rooms->name)

@section('content')
<main>
    <div class="container-fluid content">
        <h2>Booking - {{ $rooms->name }}</h2>
        <div id="roomCarousel{{ $rooms->id }}" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#roomCarousel{{ $rooms->id }}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#roomCarousel{{ $rooms->id }}" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#roomCarousel{{ $rooms->id }}" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @foreach(json_decode($rooms->images, true) as $index => $image)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ asset($image) }}" class="d-block w-100" alt="{{ $rooms->name }}">
                    </div>
                @endforeach
            </div>
            <div>
                <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel{{ $rooms->id }}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel{{ $rooms->id }}" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-7">
                <div class="wrapper">
                    <h4>Rooms Details</h4>
                    <p class="booking-room-detail">{!! nl2br(e($rooms->description)) !!}</p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="wrapper">
                    <h4>Your Reservation</h4>
                    <form action="" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floating-name" value="{{ $UserInfo['name'] }}">
                            <label for="floating-name">Guest Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floating-email" value="{{ $UserInfo['email'] }}">
                            <label for="floating-email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="floating-phone" value="{{ $UserInfo['phone'] }}">
                            <label for="floating-phone">Phone Number</label>
                        </div>
                        <p>Check-in date: {{ $checkinDate }}</p>
                        <p>Check-out date: {{ $checkoutDate }}</p>
                        <p>Number of nights: {{ $numOfNights }}</p>
                        <p>RM{{ $rooms->price }} per night</p>
                        <p>Total: RM{{ number_format($rooms->price * $numOfNights, 2) }}</p>
                        <button type="submit" class="btn btn-bd-primary">Confirm Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection