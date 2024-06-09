@extends('layouts.layout')

@section('title', 'Contact Us')

@section('content')
<main>
    <div class="container-fluid content">
        <div class="row g-3 mb-5">
            <div class="col-6">
                <h2 class="mb-4">Contact Us</h2>
                <p>We're here to help and answer any questions you might have. We look forward to hearing from you!</p>
                <div class="row">
                    <div class="col-auto">
                        <p><i class="bi bi-geo-alt-fill"></i></p>
                    </div>
                    <div class="col">
                        <p>168, Jln Imbi, Bukit Bintang, 55100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <p><i class="bi bi-telephone-fill"></i></p>
                    </div>
                    <div class="col">
                        <p>03 2142 8000</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <p><i class="bi bi-envelope-fill"></i></p>
                    </div>
                    <div class="col">
                        <p>azurewaveinn@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-6 d-flex align-items-center justify-content-end">
                <img src="images/contact-us.png" alt="contact us" width="400px">
            </div>
        </div>
        <div class="row g-5 mb-3">
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
            <div class="col-6">
                @if ($last_5_rates->isEmpty())
                    <p class="text-body-secondary">No ratings yet.</p>
                @else
                    @foreach ($last_5_rates as $rate)
                        <div class="card w-100 mb-3">
                            <div class="card-body">
                                <div class="card-title fs-5">
                                    @for ($i = 0; $i < $rate->rating; $i++)
                                        <i class="bi bi-star-fill rated"></i>
                                    @endfor
                                    @for ($i = 0; $i < 5-($rate->rating); $i++)
                                        <i class="bi bi-star-fill not-rated"></i>
                                    @endfor
                                    <small class="text-body-secondary ms-5 fst-italic fs-6">{{$rate->created_at}}</small>
                                </div>
                                @if (!($rate->comment))
                                    <p class="text-body-secondary card-text">No content</p>
                                @else
                                <p class="card-text">{{$rate->comment}}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <p class="text-body-secondary"><small><i>Last 5 reviews are shown</i></small></p>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection