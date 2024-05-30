@extends("layouts.layout")

@section('title', 'Room Booking')

@section('content')
<main>
    <div class="container-fluid content">
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
                            <input type="text" class="form-control" id="floating-name" value="name from db">
                            <label for="floating-name">Guest Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floating-email" value="email from db">
                            <label for="floating-email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="floating-phone" value="phone from db">
                            <label for="floating-phone">Email</label>
                        </div>
                        <p>Check-in date: dd/mm/yyyy</p>
                        <p>Check-out date: dd/mm/yyyy</p>
                        <p>Number of nights: X</p>
                        <p>Total: RMXXX</p>
                        <button type="submit" class="btn btn-bd-primary">Confirm Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection