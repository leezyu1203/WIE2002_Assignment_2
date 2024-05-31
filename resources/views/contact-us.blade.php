@extends('layouts.layout')

@section('title', 'Contact Us')

@section('content')
<main>
    <div class="container-fluid content">
        <div class="row g-3 mb-5">
            <div class="col-6">
                <h2 class="mb-4">Contact Us</h2>
                <p>We're here to help and answer any questions you might have. We look forward to hearing from you!</p>
                <p><i class="bi bi-geo-alt-fill me-3"></i>Hotel Address</p>
                <p><i class="bi bi-telephone-fill me-3"></i>03 2142 8000</p>
                <p><i class="bi bi-envelope-fill me-3"></i>hotelname@gmail.com</p>
            </div>
            <div class="col-6">
                <div class="temp-image"></div>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-6">
                <h4 class="mb-3">Rate Us</h4>
                <form action="{{route('rate.store')}}" method="post">
                @csrf
                    <div class="rating">
                        <span class="star" data-value="5">&#9733;</span>
                        <span class="star" data-value="4">&#9733;</span>
                        <span class="star" data-value="3">&#9733;</span>
                        <span class="star" data-value="2">&#9733;</span>
                        <span class="star" data-value="1">&#9733;</span>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea class="form-control" name="comment" id="comment" rows="10"></textarea>
                    </div>
                    <button type="submit" id="send-rating" class="btn btn-bd-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection