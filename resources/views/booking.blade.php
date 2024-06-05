@extends("layouts.layout")

@section('title', 'Room Booking', 'Booking - ' . $rooms->name)

@section('content')
<main>
    <div class="container-fluid content">
        <h2>Booking - {{ $rooms->name }}</h2>
        <div class="temp-image">room image</div>
        <div class="row g-3">
            <div class="col-md-7">
                <div class="wrapper">
                    rooms details
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
                        <p>Total: RMXXX</p>
                        <button type="submit" class="btn btn-bd-primary">Confirm Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection