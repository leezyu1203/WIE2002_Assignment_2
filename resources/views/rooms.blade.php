@extends('layouts.layout')

@section('title', 'Rooms')

@section('content')
<main>
    <div class="container-fluid content">
        <h2>Rooms</h2>
        <div class="row g-3">
            <div class="col-8">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <div class="temp-image">room carousel</div>
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title">Room style</h5>
                                <p class="card-text">Description for the room</p>
                                <p class="card-text">RMXX per night</p>
                                @if ($checkinDate || $checkoutDate)
                                    <a href="{{route('rooms.booking')}}" class="btn btn-bd-primary">Book Now</a>
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
            </div>
            <div class="col-4">
                <div class="wrapper">
                    <form action="{{route('rooms')}}" method="get">
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