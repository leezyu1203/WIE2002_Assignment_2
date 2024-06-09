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
                    <form action="{{ route('myprofile.handle_booking', ['roomId' => $rooms->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="checkinDate" value="{{ $checkinDate }}">
                        <input type="hidden" name="checkoutDate" value="{{ $checkoutDate }}">
                        <input type="hidden" name="numOfNights" value="{{ $numOfNights }}">
                        <input type="hidden" name="roomId" value="{{ $rooms->id }}">
                        <input type="hidden" name="totalCost" value="{{ $rooms->price * $numOfNights }}">

                        <p><small>Guest Name</small><br>{{ $UserInfo['name'] }}</p>
                        <p><small>Email</small><br>{{ $UserInfo['email'] }}</p>
                        <p><small>Phone Number</small><br>{{ $UserInfo['phone'] }}</p>
                        <p><small>Check-in date:</small> {{ $checkinDate }}</p>
                        <p><small>Check-out date:</small> {{ $checkoutDate }}</p>
                        <p><small>Number of rooms left:</small> {{ $rooms->numsRooms - $rooms->bookings()->where(function ($query) use ($checkinDate, $checkoutDate) {
                                $query->whereBetween('checkin_date', [$checkinDate, $checkoutDate])
                                    ->orWhereBetween('checkout_date', [$checkinDate, $checkoutDate])
                                    ->orWhere(function ($query) use ($checkinDate, $checkoutDate) {
                                        $query->where('checkin_date', '<=', $checkinDate)
                                            ->where('checkout_date', '>=', $checkoutDate);
                                    });
                            })->count() }}
                        </p>
                        <p><small>Number of nights:</small> {{ $numOfNights }}</p>
                        <p>RM{{ $rooms->price }} per night</p>
                        <h5>Total: RM{{ number_format($rooms->price * $numOfNights, 2) }}</h5>
                        <button type="submit" class="btn btn-bd-primary">Confirm Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="/js/handleDateInput.js"></script>
@endsection