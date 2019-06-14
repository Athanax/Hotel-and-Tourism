@extends('inc.hotel')

@section('content')
    <!-- Welcome Area Start -->
    <section class="welcome-area">
        <div class="welcome-slides owl-carousel">
            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url(/storage/uploads/hotels/covers/{{$hotel->cover_1}}); max-height: 500px;" data-img-url="/storage/uploads/hotels/covers/{{$hotel->cover_1}}">
                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12">
                                <div class="welcome-text text-center">
                                    <h6 data-animation="fadeInLeft" data-delay="500ms">---------{{$hotel->type}}---------</h6>
                                    <h2 data-animation="fadeInLeft" data-delay="500ms">{{$hotel->name}}</h2>
                                    <a href="#" class="btn roberto-btn btn-2" data-animation="fadeInLeft" data-delay="800ms">Discover Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url(/storage/uploads/hotels/covers/{{$hotel->cover_2}}); max-height: 500px;" data-img-url="/storage/uploads/hotels/covers/{{$hotel->cover_2}}">
                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12">
                                <div class="welcome-text text-center">
                                    <h6 data-animation="fadeInUp" data-delay="500ms">---------{{$hotel->type}}---------</h6>
                                    <h2 data-animation="fadeInUp" data-delay="500ms">{{$hotel->name}}</h2>
                                    <a href="#" class="btn roberto-btn btn-2" data-animation="fadeInUp" data-delay="800ms">Discover Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url(/storage/uploads/hotels/covers/{{$hotel->cover_3}}); max-height: 500px;" data-img-url="/storage/uploads/hotels/covers/{{$hotel->cover_3}}">
                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12">
                                <div class="welcome-text text-center">
                                    <h6 data-animation="fadeInDown" data-delay="500ms">---------{{$hotel->type}}---------</h6>
                                    <h2 data-animation="fadeInDown" data-delay="500ms">{{$hotel->name}}</h2>
                                    <a href="#" class="btn roberto-btn btn-2" data-animation="fadeInDown" data-delay="800ms">Discover Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Welcome Area End -->

    <!-- About Us Area Start -->
    <section class="roberto-about-area section-padding-100-0">
        <!-- Hotel Search Form Area -->
        <div class="hotel-search-form-area">
            <div class="container-fluid">
                <div class="hotel-search-form">
                    <form action="{{ route('hotels.check', ['id'=>$hotel->id]) }}" method="get">
                        <div class="row justify-content-between align-items-end">
                            <div class="col-6 col-md-2 col-lg-3">
                                <label for="checkIn">Check In - Check Out</label>
                                <input required type="text" class="form-control" id="reservation" name="checkin">
                            </div>
                            {{-- <div class="col-6 col-md-2 col-lg-3">
                                <label for="checkOut">Check Out</label>
                                <input required type="date" class="form-control" id="checkOut" name="checkout">
                            </div> --}}
                            <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                            <div class="col-4 col-md-3">
                                <label for="room">Room</label>
                                <select required name="rooms" id="room" class="form-control">
                                    <option selected value="1">01 (One) </option>
                                    <option value="2">02 (Two)</option>
                                    <option value="3">03 (Three)</option>
                                    <option value="4">04 (Four)</option>
                                    <option value="5">05 (Five)</option>
                                    <option value="6">06 (Six)</option>
                                    <option value="7">07 (Seven)</option>
                                </select>
                            </div>
                            
                            <div class="col-12 col-md-3">
                                <button type="submit" class="form-control btn roberto-btn w-100">Check Availability</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container mt-100">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <!-- Section Heading -->
                    <div class="section-heading wow fadeInUp" data-wow-delay="100ms">
                        <h6>About Us</h6>
                        <h2>{{$hotel->name}}</h2>
                        
                    </div>
                    <div class="about-us-content mb-100">
                        <h5 class="wow fadeInUp" data-wow-delay="300ms">{{$hotel->about}}</h5>
                        <p class="wow fadeInUp" data-wow-delay="400ms">Manager: <span>Michen Taylor</span></p>
                    <img src="{{ URL::asset('/storage/img/core-img/signature.png') }}" alt="" class="wow fadeInUp" data-wow-delay="500ms">
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="about-us-thumbnail mb-100 wow fadeInUp" data-wow-delay="700ms">
                        <div class="row no-gutters">
                            
                            <div class="col-12" >
                                <div class="single-thumb " style="max-height:300px; ">
                                    <img src="/storage/uploads/hotels/about/{{$hotel->about_image}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Area End -->

    <!-- Service Area Start -->
    <div class="roberto-service-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="service-content d-flex align-items-center justify-content-between">
                        <!-- Single Service Area -->
                        <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="100ms">
                            <img src="/storage/img/core-img/icon-1.png" alt="">
                            <h5>Transportion</h5>
                        </div>

                        <!-- Single Service Area -->
                        <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="300ms">
                            <img src="/storage/img/core-img/icon-2.png" alt="">
                            <h5>Reiseservice</h5>
                        </div>

                        <!-- Single Service Area -->
                        <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="500ms">
                            <img src="/storage/img/core-img/icon-3.png" alt="">
                            <h5>Spa Relaxtion</h5>
                        </div>

                        <!-- Single Service Area -->
                        <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="700ms">
                            <img src="/storage/img/core-img/icon-4.png" alt="">
                            <h5>Restaurant</h5>
                        </div>

                        <!-- Single Service Area -->
                        <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="900ms">
                            <img src="/storage/img/core-img/icon-1.png" alt="">
                            <h5>Bar &amp; Drink</h5>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Area End -->
    
    <!-- Our Room Area Start -->
    <section class="roberto-rooms-area">
        <div class="rooms-slides owl-carousel">

            @foreach ($rooms as $room)
                {{-- {{ $room->id }} --}}
                <!-- Single Room Slide -->
                <div class="single-room-slide d-flex align-items-center" style="height: 600px;">
                    <!-- Thumbnail -->
                    <div class="room-thumbnail h-100 bg-img" style="background-image: url('/storage/uploads/hotels/rooms/{{ $room->image }}');"></div>

                    <!-- Content -->
                    <div class="room-content">
                        <h2 data-animation="fadeInUp" data-delay="100ms">{{ $room->size_type }}</h2>
                        <h3 data-animation="fadeInUp" data-delay="300ms">${{ $room->cost }} <span>/ Day</span></h3>
                        <ul class="room-feature" data-animation="fadeInUp" data-delay="500ms">
                            <li><span><i class="fa fa-check"></i> Size</span> <span>: {{ $room->size }} ft</span></li>
                            <li><span><i class="fa fa-check"></i> Capacity</span> <span>: Max persion {{ $room->capacity }}</span></li>
                            <li><span><i class="fa fa-check"></i> Bed</span> <span>: {{ $room->beds }} Beds</span></li>
                            <li><span><i class="fa fa-check"></i></span> <span>{{ $room->desciption }}</span></li>
                        </ul>
                        <a href="#" class="btn roberto-btn mt-30" data-animation="fadeInUp" data-delay="700ms">View Details</a>
                    </div>
                </div>

            @endforeach
            

        </div>
    </section>
    <!-- Our Room Area End -->
<br>
    <!-- Testimonials Area Start -->
    <section class="roberto-testimonials-area" style="">
        <div class="container">
            <!-- Section Heading -->
            <div class="section-heading text-center">
                    <h6>Testimonials</h6>
                    
                </div>
            <div class="row ">
                
                <div class="col-12 col-md-6 text-center" >
                        
                    <!-- Testimonial Slide -->
                    <div class="testimonial-slides owl-carousel   mb-100">
                        @if ($testimonials)
                        @foreach ($testimonials as $testimonial)
                            
                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide ">
                            <h5>“{{ $testimonial->review }}”</h5>
                            <div class="rating-title">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                </div>
                                <h6>{{ $testimonial->user_name }}<span> &nbsp;- Tourist</span></h6>
                            </div>
                        </div>
                        @endforeach
                      
                        @endif
                        
                           
                    </div>
                </div>
        
                <div class="col-12 col-md-6">
            
                    @if (Auth::user())
                    <h5>Write a review</h5>
                    <div class="col-md-12 roberto-contact-form">
                        <form  action="{{ route('testimonials.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ $hotel->id }}">
                                <input type="hidden" name="testi_type" value="hotel">
                                <textarea required class="form-control mb-30" name="testimonial" id="" cols="" rows=""></textarea>
                            </div>
                            <div class="container-fluid">
                                <input type="submit" class="btn roberto-btn pull-right">
                            </div>
                        </form>
                    </div>
                    @else
                    <div class="text-center ">
                        <h5>From the manager</h5>
                        <p>Enjoy the best expirience in {{ $hotel->name }}. You'll enjoy that feeling and have a chance to write a testimonial. They write what they have seen</p>                   
                    </div>
                    @endif 
                </div> 
            </div>
        </div>
    </section>
    <!-- Testimonials Area End -->
    
    <!-- Projects Area Start -->
    <section class="roberto-project-area">
        <!-- Projects Slide -->
        <div class="projects-slides owl-carousel">
            @if ($images)
                @foreach ($images as $image)
                    
                    <!-- Single Project Slide -->
                    <div class="single-project-slide  bg-img" style="background-image: url('/storage/uploads/hotels/images/{{ $image->url }}'); height: 400px;">
                        <!-- Project Text -->
                        <div class="project-content">
                            <div class="text">
                                <h6>{{ $image->field }}</h6>
                                <h5>{{ $image->activity }}</h5>
                            </div>
                        </div>
                        <!-- Hover Effects -->
                        <div class="hover-effects">
                            <div class="text">
                                <h6>{{ $image->field }}</h6>
                                <h5>{{ $image->activity }}</h5>
                                <p>{{ $image->description }}</p>
                            </div>
                            <a href="#" class="btn project-btn">Book now &nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                @endforeach
            @endif
            
            
        

            
        </div>
    </section>
    <!-- Projects Area End -->
<br>

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
                        <a href="/hotels/contact/{{ $hotel->id }}" class="btn roberto-btn mb-50">Contact Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action Area End -->

    <!-- Partner Area Start -->
    <div class="partner-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="partner-logo-content d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="300ms">
                        <!-- Single Partner Logo -->
                        <a href="#" class="partner-logo"><img src="/storage/img/core-img/p1.png" alt=""></a>
                        <!-- Single Partner Logo -->
                        <a href="#" class="partner-logo"><img src="/storage/img/core-img/p2.png" alt=""></a>
                        <!-- Single Partner Logo -->
                        <a href="#" class="partner-logo"><img src="/storage/img/core-img/p3.png" alt=""></a>
                        <!-- Single Partner Logo -->
                        <a href="#" class="partner-logo"><img src="/storage/img/core-img/p4.png" alt=""></a>
                        <!-- Single Partner Logo -->
                        <a href="#" class="partner-logo"><img src="/storage/img/core-img/p5.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Area End -->
    {{-- <script>
        $(document).ready(function(){
            alert();
        });
    </script> --}}
@endsection


