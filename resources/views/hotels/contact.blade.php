@extends('inc.hotel')

@section('content')
    <!-- Call To Action Area Start -->
    <section class="roberto-cta-area">
        <div class="container">
            <div class="cta-content bg-img bg-overlay jarallax" style="background-image: url(/storage/img/bg-img/1.jpg);">
                <div class="row align-items-center">
                    <div class="col-12 col-md-7">
                        <div class="cta-text mb-50">
                            <h2>Contact us now!</h2>
                            <h6 style="letter-spacing:2px;">Call:&nbsp; {{ $hotel->phone_1 }} {{ ' or  '.$hotel->phone_2 }}</h6>
                            <h6 style="letter-spacing:2px;">Email: &nbsp;{{ $hotel->email }}</h6>
                            <h6 style="letter-spacing:2px;">Address:&nbsp; {{ $hotel->address }}  {{' , '. $hotel->state .'.'}}</h6>

                        </div>
                    </div>
                    <div class="col-12 col-md-5 text-right">
                        <a href="#" class="btn roberto-btn mb-50">Contact Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action Area End -->
    
    <!-- Contact Form Area Start -->
    <div class="roberto-contact-form-area" style="padding:10px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                        <h6>Contact Us</h6>
                        <h2>Leave Message</h2>
                    </div>
                </div>
            </div>
            @include('inc.message')
            <div class="row">
                <div class="col-12">
                    <!-- Form -->
                    <div class="roberto-contact-form">
                        <form action="{{ route('hotels.message') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <input type="hidden" name="type" value="{{ $hotel->id }}">
                                <input type="hidden" name="user_id" value="{{ $hotel->user_id }}">
                                <div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
                                    <input type="text" name="name" class="form-control mb-30" placeholder="Your Name">
                                </div>
                                <div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
                                    <input type="email" name="email" class="form-control mb-30" placeholder="Your Email">
                                </div>
                                <div class="col-12 col-lg-12 wow fadeInUp" data-wow-delay="100ms">
                                    <input type="text" name="subject" class="form-control mb-30" placeholder="Subject">
                                </div>
                                <div class="col-12 wow fadeInUp" data-wow-delay="100ms">
                                    <textarea name="message" class="form-control mb-30" placeholder="Your Message"></textarea>
                                </div>
                                <div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
                                    <button type="submit" class="btn roberto-btn mt-15">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form Area End -->
@endsection