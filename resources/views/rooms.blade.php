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
                                <a href="..." class="btn btn-bd-primary">Book Now</a>
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
                            <input type="date" class="form-control" id="checkin-date" name="checkin-date">
                        </div>
                        <div class="mb-4">
                            <label for="checkout-date">Check-out Date</label>
                            <input type="date" class="form-control" id="checkout-date" name="checkout-date">
                        </div>
                        <button type="submit" class="btn btn-bd-primary w-100">Check Availability</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection