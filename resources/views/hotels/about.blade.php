@extends('inc.hotel')

@section('content')
     <!-- About Us Area Start -->
     <section class="roberto-about-us-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="about-thumbnail pr-lg-5 mb-100 wow fadeInUp" data-wow-delay="100ms">
                    <img src="/storage/uploads/hotels/about/{{ $hotel->about_image }}" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <!-- Section Heading -->
                    <div class="section-heading wow fadeInUp" data-wow-delay="300ms">
                        <h6>Testimonials</h6>
                        <h2>{{ $hotel->name }}</h2>
                    </div>
                    <div class="about-content mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <p>
                            {{ $hotel->about }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Area End -->

@endsection