@extends('layouts.layout')

@section('title', 'Home')

@section('content')
<main>
    <div class="temp-image">place for image</div>
    <div class="container-fluid content">
        <form action="{{route('rooms')}}" method="get">
            <div class="row">
                <div class="col">
                    <label class="p-2" for="checkin-date">Check-in Date</label>
                </div>
                <div class="col">
                    <label class="p-2" for="checkout-date">Check-out Date</label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="date" class="form-control" id="checkin-date" name="checkin-date" required>
                </div>
                <div class="col">
                    <input type="date" class="form-control" id="checkout-date" name="checkout-date" required>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-bd-primary w-100">Check Availability</button>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection