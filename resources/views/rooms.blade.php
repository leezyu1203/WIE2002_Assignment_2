@extends('layouts.layout')

@section('title', 'Rooms')

@section('content')
<main>
    <div class="container-fluid content">
        <h2>Rooms</h2>
        <div class="row g-3">
            <div class="col-8">
                <div class = "roomlist">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <div id="roomCarousel1" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#roomCarousel1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#roomCarousel1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#roomCarousel1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('images/StandardRoom1.jpg') }}" class="d-block w-100" alt="StandardRoom1">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/StandardRoom2.jpg') }}" class="d-block w-100" alt="StandardRoom2">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/StandardRoom3.jpg') }}" class="d-block w-100" alt="StandardRoom3">
                                        </div>
                                    </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel1" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel1" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title">Stardard Room</h5>
                                    <p class="card-text">Experience comfort and convenience in our well-appointed Standard Room, designed for both business and leisure travelers. Our Standard Rooms offer a cozy and modern ambiance, ensuring a restful stay. Whether you're here for a short stay or an extended visit, our Standard Rooms provide all the essentials you need for a relaxing and productive stay.</p>
                                    <p class="card-text">RM200 per night</p>
                                    @if ($checkinDate || $checkoutDate)
                                        <a href="{{route('rooms.booking', ['checkin-date' => $checkinDate, 'checkout-date' => $checkoutDate])}}" class="btn btn-bd-primary">Book Now</a>
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
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <div id="roomCarousel2" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#roomCarousel2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#roomCarousel2" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#roomCarousel2" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('images/DeluxeRoom1.jpg') }}" class="d-block w-100" alt="DeluxeRoom1">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/DeluxeRoom2.jpg') }}" class="d-block w-100" alt="DeluxeRoom2">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/DeluxeRoom3.jpg') }}" class="d-block w-100" alt="DeluxeRoom3">
                                        </div>
                                    </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel2" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel2" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title">Deluxe Room</h5>
                                    <p class="card-text">Upgrade your stay with our Deluxe Room, offering extra space and enhanced amenities for a more luxurious experience. Perfect for those who appreciate a touch of elegance and added comfort. Enjoy the perfect blend of comfort and style in our Deluxe Room, designed to make your stay truly memorable.</p>
                                    <p class="card-text">RM280 per night</p>
                                    @if ($checkinDate || $checkoutDate)
                                        <a href="{{route('rooms.booking', ['checkin-date' => $checkinDate, 'checkout-date' => $checkoutDate])}}" class="btn btn-bd-primary">Book Now</a>
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
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <div id="roomCarousel3" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#roomCarousel3" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#roomCarousel3" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#roomCarousel3" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('images/SuperiorRoom1.jpg') }}" class="d-block w-100" alt="SuperiorRoom1">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/SuperiorRoom2.jpg') }}" class="d-block w-100" alt="SuperiorRoom2">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/SuperiorRoom3.jpg') }}" class="d-block w-100" alt="SuperiorRoom3">
                                        </div>
                                    </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel3" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel3" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title">Superior Room1</h5>
                                    <p class="card-text">Indulge in the added space and refined comfort of our Superior Room, perfect for guests seeking a more luxurious and relaxing stay. With premium amenities and elegant decor, our Superior Rooms provide an elevated experience. Experience the perfect balance of luxury and comfort in our Superior Room, designed to exceed your expectations.</p>
                                    <p class="card-text">RM400 per night</p>
                                    @if ($checkinDate || $checkoutDate)
                                        <a href="{{route('rooms.booking', ['checkin-date' => $checkinDate, 'checkout-date' => $checkoutDate])}}" class="btn btn-bd-primary">Book Now</a>
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
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <div id="roomCarousel4" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#roomCarousel4" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#roomCarousel4" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#roomCarousel4" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('images/Suite1.jpg') }}" class="d-block w-100" alt="Suite1">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/Suite2.jpg') }}" class="d-block w-100" alt="Suite2">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/Suite3.jpg') }}" class="d-block w-100" alt="Suite3">
                                        </div>
                                    </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel4" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel4" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title">Suite</h5>
                                    <p class="card-text">Elevate your stay with our luxurious Suite, offering expansive space and top-tier amenities for an unforgettable experience. Ideal for families, business travelers, or anyone seeking the ultimate in comfort and style. Experience unparalleled luxury and comfort in our Suite, designed to provide a home away from home.</p>
                                    <p class="card-text">RM350 per night</p>
                                    @if ($checkinDate || $checkoutDate)
                                        <a href="{{route('rooms.booking', ['checkin-date' => $checkinDate, 'checkout-date' => $checkoutDate])}}" class="btn btn-bd-primary">Book Now</a>
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