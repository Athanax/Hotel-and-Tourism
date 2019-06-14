@extends('inc.pages')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
<section class="slider">
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
        <div class="item"> <img data-src="{{ URL::asset('storage/uploads/sites/covers/'.$site->cover_1) }}" alt="first slide" src="{{ URL::asset('storage/uploads/sites/covers/'.$site->cover_1) }}">
            <div class="container">
            <div class="carousel-caption text-center">
                <h1 class="">{{ $site->name }}</h1>
                <p>{{ $site->slider_text }}.</p>
                <p class="">
                    <a class="pull-left" href="">
                        <form method="get" action="{{ route('booksites.create') }}">
                            {{-- {{ csrf_field() }} --}}
                            {{-- <input type="hidden" name="_method" value="patch"> --}}
                            <input type="hidden" name="site_id" value="{{ $site->id }}" class="form-control">
                            <button type="submit" class="btn roberto-btn   btn-lg" style="background-color:aliceblue">Book now</button>                       
                        </form>
                    </a>
   
                </p>
            </div>
            </div>
        </div>
        <div class="item"> <img data-src="{{ URL::asset('storage/uploads/sites/covers/'.$site->cover_2) }}" alt="second slide" src="{{ URL::asset('storage/uploads/sites/covers/'.$site->cover_2) }}">
            <div class="container">
            <div class="carousel-caption text-center">
                <h1 class="">{{ $site->name }}.</h1>
                <p>{{ $site->slider_text }}</p>
                <p class="">
                        <a class="pull-left" href="">
                            <form method="get" action="{{ route('booksites.create') }}">
                                {{-- {{ csrf_field() }} --}}
                                {{-- <input type="hidden" name="_method" value="patch"> --}}
                                <input type="hidden" name="site_id" value="{{ $site->id }}" class="form-control">
                                <button type="submit" class="btn roberto-btn btn-lg">Book now</button>                       
                            </form>
                        </a>
               
                    </p>
            </div>
            </div>
        </div>
        <div class="item active"> <img data-src="{{ URL::asset('storage/uploads/sites/covers/'.$site->cover_3) }}" alt="third slide" src="{{ URL::asset('storage/uploads/sites/covers/'.$site->cover_3) }}">
            <div class="container">
            <div class="carousel-caption text-center">
                <h1 class="">{{ $site->name }}</h1>
                <p>{{ $site->slider_text }}.</p>
                <p class="">
                        <a class="pull-left" href="">
                            <form method="get" action="{{ route('booksites.create') }}">
                                {{-- {{ csrf_field() }} --}}
                                {{-- <input type="hidden" name="_method" value="patch"> --}}
                                <input type="hidden" name="site_id" value="{{ $site->id }}" class="form-control">
                                <button type="submit" class="btn roberto-btn  btn-lg">Book now</button>                       
                            </form>
                        </a>
                        
                    </p>
            </div>
            </div>
        </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon carousel-control-left"></span></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon carousel-control-right"></span></a>
    </div>
</section>
        
        <!--end of slider section-->
<section class="main__middle__container homepage">

        <div class="container">
        <br>
            <div class="container" id="readmore">
                <div class="row no_padding nothing">
                    <div class="col-md-6" >
                        <h3>Why {{ $site->name }}?</h3>
                        <hr>
                        <p>{{ $site->overview }}</p>
                    </div>
                    <div class="col-md-6"> 
                        <img src="{{ URL::asset('storage/images/content__images/pic2.jpg') }}" alt="image" class="img-responsive no-margin full-width"> 
                    </div>
                    
                </div>
                {{-- <iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=&amp;aq=&amp;sll=37.422023,-122.084337&amp;sspn=0.00357,0.008229&amp;ie=UTF8&amp;ll=37.421981,-122.084531&amp;spn=0.001785,0.004115&amp;t=m&amp;z=18&amp;output=embed"></iframe> --}}
                <br><br>
            </div>

            {{-- the tabs start here --}}

                <ul class="nav nav-tabs" ">
                  <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
                  <li><a href="#activities" data-toggle="tab">Park activities</a></li>
                  <li class=""><a href="#how_to_get_there" data-toggle="tab">How to get there</a></li>
                  <li class=""><a href="#attractions" data-toggle="tab">Attractions</a></li>
                  <li><a href="#accommodation" data-toggle="tab">Accommodation</a></li>
                  <li class=""><a href="#entry_fees" data-toggle="tab">Park entry fees</a></li>
                  <li><a href="#contacts" data-toggle="tab">Contacts</a></li>
                </ul>
                <div class="tabbable">
                  <div class="tab-content">

                    {{-- this is the Overview pane --}}

                    <div class="tab-pane active" id="overview">
                      <h3>Overview</h3>
                        <p>{{ $site->about }}</p>
                    </div>

                    {{-- this is trhe activities pane --}}

                    @include('inc.message')

                    <div class="tab-pane" id="activities">
                      <h4>Activities</h4>
                    <img  src="{{ URL::asset('storage/images/activities/bird-watching_0.jpg') }}" alt="activity_image">
                    <img  src="{{ URL::asset('storage/images/activities/camping_0.jpg') }}" alt="activity_image">
                    <img  src="{{ URL::asset('storage/images/activities/game-viewing_0.jpg') }}" alt="activity_image">
                    <img  src="{{ URL::asset('storage/images/activities/photography.jpg') }}" alt="activity_image">
                    <img  src="{{ URL::asset('storage/images/activities/scenic_0.jpg') }}" alt="activity_image">

                    </div>

                    {{-- this is the how to get there pane --}}

                    <div class="tab-pane" id="how_to_get_there"><br>
                        <h3 class="text-center">How to get there?</h3>
                        <p> <b> By Road:</b> {{ $site->route }}
                        </p>
                        
                    </div><br>

                    {{-- this is the attractiuons pane --}}

                    <div class="tab-pane" id="attractions">
                        <ul><br>
                            <h4>Attractions</h4>
                                <li>The only Wildlife park in the world that is so close to the city</li>    
                                <li>Black rhinoceros :which is an endangered species</li>    
                                <li>The first park to be gazetted in Kenya on December 16, 1946</li>    
                                <li>Major rhino sanctuary for breeding and restocking other parks</li>
                                <li>Diverse birdlife:Has over 400 bird species. At least 20 of which are seasonal European migrants.</li>    
                                    
                        </ul><br>
                    </div>

                    {{-- this is the Accommodation pane --}}

                    <div class="tab-pane" id="accommodation"><br>
                        
                        <div class="single-widget-area mb-100">
                            <h4 class="widget-title mb-30">Accommodation</h4>
                            @foreach ($site_hotels as $hotel)
                                 <!-- Single Recent Post -->
                                <div class="single-recent-post d-flex">
                                    <!-- Thumb -->
                                    <div class="post-thumb">
                                        <a href="single-blog.html"><img src="/storage/uploads/hotels/about/{{ $hotel->about_image }}" alt=""></a>
                                    </div>
                                    <!-- Content -->
                                    <div class="post-content">
                                        <!-- Post Meta -->
                                        <div class="post-meta">
                                            <a href="#" class="post-author">{{ $hotel->name }}</a>
                                            <a href="#" class="post-tutorial">{{ $hotel->type }}</a>
                                        </div>
                                        <a href="single-blog.html" class="post-title">{{ $hotel->about }}</a>
                                    </div>
                                </div>
                            @endforeach
                           
                        </div>
                    </div>

                    {{-- thgis is the Entry fees pane --}}

                    <div class="tab-pane" id="entry_fees">
                        <div class="container">
                            <h3 class="text-center">Site Rates</h3>
                            <table class="dc_table_s1" cellspacing="0" summary="CPU Comparison" style="width:100%;">
                                <caption>
                                Park entry fees
                                </caption>
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="2" abbr="Xeon E5-2687W">Resident</th>
                                        <th scope="col" colspan="2" abbr="Core" i7="" 990x"="">Non resident</th>
                                        <th scope="col" colspan="2" abbr="Opteron 6274">Citizen</th>
                                    </tr>
                                </thead>
                                 
                                <tbody>
                                    <tr>
                                        
                                        <td>CHILD</td>
                                        <td>ADULT</td>
                                        <td>CHILD</td>
                                        <td>ADULT</td>
                                        <td>CHILD</td>
                                        <td>ADULT</td>
                                    </tr>
                                    <tr>
                                        
                                        <td>$ {{ $rates->resident_child }}</td>
                                        <td>$ {{ $rates->resident_adult }}</td>
                                        <td>$ {{ $rates->non_resident_child }}</td>
                                        <td>$ {{ $rates->non_resident_adult }}</td>
                                        <td>$ {{ $rates->citizen_child }}</td>
                                        <td>$ {{ $rates->citizen_child }}</td>
                                    </tr>
                                </tbody>
                            </table><br>
                        </div>
                    </div>

                    {{-- this is the contacts pane --}}

                    <div class="tab-pane" id="contacts">
                        <div class="container">
                            <br>
                            <section class="contact-us">
                                <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                    <h3>Send us a message</h3>
                                    <hr>
                                    <p>Our friendly customer service representatives are committed to answering all your questions and meeting any need you may have. We would love to hear from you! Please fill out the form below so we may assist you.</p>
                                    <br />
                                    <p id="feedback"></p>
                                    <form role="form" id="contact-form" name="contact-form" method="post" action="{{ route('sites.contact') }}" class="contact-form">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="user_id" value="{{ $site->user_id }}">
                                        <input type="hidden" name="type" value="{{ $site->id }}">
                                        <div class="form-group col-md-6">
                                            <label class="sr-only" for="exampleInputEmail1">Your Name: *</label>
                                            <input required type="text" class="form-control" id="name" name="name" placeholder="Your Name: *">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="sr-only" for="exampleInputEmail1">Email: *</label>
                                            <input required type="email" class="form-control" id="email" name="email" placeholder="Email: *">
                                        </div>
                                        <div class="clearfix"></div>
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputEmail1">Subject:</label>
                                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject:">
                                            </div>
                                        <div class="form-group">
                                            <textarea required class="form-control" id="message" name="message" rows="5" placeholder="Message: *"></textarea>
                                        </div>
                                        <input id="submit-button" type="submit" class="btn btn-lg btn-info pull-right" value="Submit">
                                    </form>
                                    </div>
                                    <div class="col-md-4">
                                    <h3>Get in touch with us</h3>
                                    <hr>
                                    <p>We do everything to make sure that our vistors are comfortable with {{ $site->name }}.</p>
                                    <p>We pprovide 24 hour support to everyone who keeps in touch with us through either of the means below.</p>
                                    <p class="black-text"><span class="orange">Address:</span> {{ $site->address }} {{ $site->state }},  {{ $site->counrty }}.</p>
                                    <p class="black-text"><span class="orange">Telephone:</span> {{ $site->phone }}</p>
                                    <p class="black-text"><span class="orange">Email:</span> {{ $site->email }}</p>
                                    <p class="black-text"><span class="orange">Facebook:</span> {{ $site->facebook }}</p>
                                    <p class="black-text"><span class="orange">Google+:</span> {{ $site->google_plus }}</p>
                                    <p class="black-text"><span class="orange">Twitter:</span> {{ $site->twitter }}</p>
                                    </div>
                                </div>
                                </div>
                            </section>
                            
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /tabbable --> 
        </div><hr>

    <!-- Testimonials Area Start -->
    <section class="roberto-testimonials-area" style="">
            <div class="container">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                        <h6>Testimonials</h6>
                        <h2>Our Guests Love Us</h2>
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
                                    <input type="hidden" name="id" value="{{ $site->id }}">
                                    <input type="hidden" name="testi_type" value="site">
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
                            <p>Enjoy the best expirience in {{ $site->name }}. You'll enjoy that feeling and have a chance to write a testimonial. They write what they have seen</p>                   
                        </div>
                        @endif 
                    </div> 
                </div>
            </div>
        </section>
        <!-- Testimonials Area End -->
    
        <div class="">
            <h3 class="text-center">Gallery</h3>
            <!-- Projects Area Start -->
                <section class="roberto-project-area">
                    <!-- Projects Slide -->
                    <div class="projects-slides owl-carousel">
                        @if ($images)
                            @foreach ($images as $image)
                            
                                <!-- Single Project Slide -->
                                <div class="single-project-slide  bg-img" style="background-image: url('/storage/uploads/sites/images/{{ $image->url }}'); height: 400px;">
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
                {{-- end of images area --}}
             
            
        </div><br>
        <div class="container">
            <div class="single-widget-area mb-100 text-center">
                <h4 class="widget-title mb-30">Near by Hotels for Accommodation</h4>
                @foreach ($site_hotels as $hotel)
                     <!-- Single Recent Post -->
                    <div class="single-recent-post d-flex col-md-offset-3">
                        <!-- Thumb -->
                        <div class="post-thumb">
                            <a href="/hotels/{{ $hotel->id }}"><img src="/storage/uploads/hotels/about/{{ $hotel->about_image }}" alt=""></a>
                        </div>
                        <!-- Content -->
                        <div class="post-content">
                            <!-- Post Meta -->
                            <div class="post-meta">
                                <a href="/hotels/{{ $hotel->id }}" class="post-author">{{ $hotel->name }}</a>
                                <a href="/hotels/{{ $hotel->id }}" class="post-tutorial">{{ $hotel->type }}</a>
                            </div>
                            <a href="/hotels/{{ $hotel->id }}" class="post-title">{{ $hotel->about }}</a>
                        </div>
                    </div>
                @endforeach
               <div class="container">
                {{ $site_hotels->links() }}
               </div>
            </div>
        </div>
                                  
                
</section>


@endsection