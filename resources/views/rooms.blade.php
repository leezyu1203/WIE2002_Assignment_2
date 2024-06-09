@extends('layouts.layout')

@section('title', 'Rooms')

@section('content')
<main>
    <div class="container-fluid content">
        <h2>Rooms</h2>
        <div class="row g-3">
            <div class="col-8">
                <div class="roomlist">
                    @foreach($rooms as $room)
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <div id="roomCarousel{{ $room->id }}" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#roomCarousel{{ $room->id }}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#roomCarousel{{ $room->id }}" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#roomCarousel{{ $room->id }}" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            @foreach(json_decode($room->images, true) as $index => $image)
                                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                    <img src="{{ asset($image) }}" class="d-block w-100" alt="{{ $room->name }}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel{{ $room->id }}" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel{{ $room->id }}" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $room->name }}</h5>
                                        <p class="card-text">{{ $room->description }}</p>
                                        <p class="card-text">RM{{ $room->price }} per night</p>
                                        @if ($checkinDate && $checkoutDate)
                                            <a href="{{ route('rooms.booking', ['roomId' => $room->id, 'checkin-date' => $checkinDate, 'checkout-date' => $checkoutDate]) }}" class="btn btn-bd-primary">Book Now</a>
                                        @else
                                            <button type="button" class="btn btn-bd-primary" data-bs-container="body"
                                                data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Please check the room availability before booking.">
                                                Book Now
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-4">
                <div class="wrapper">
                    <form action="{{ route('rooms') }}" method="get">
                        <div class="mb-4">
                            <label for="checkin-date">Check-in Date</label>
                            <input type="date" class="form-control" id="checkin-date" name="checkin-date"
                                min="{{ date('Y-m-d') }}" value="{{ $checkinDate }}">
                        </div>
                        <div class="mb-4">
                            <label for="checkout-date">Check-out Date</label>
                            <input type="date" class="form-control" id="checkout-date" name="checkout-date"
                                value="{{ $checkoutDate }}">
                        </div>
                        <button type="submit" class="btn btn-bd-primary w-100">Check Availability</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="/js/handleDateInput.js"></script>
@endsection
