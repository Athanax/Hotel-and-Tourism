@extends('layouts.app')

@section('content')
@if ($hotel)
@if ($hotel->status=='images')
    <div class="container alert alert-danger">
      <strong>Important!</strong> You have an hotel but you have not uploaded images to allow users to be able to preview
      <span class="pull-right">
        <a class="btn btn-danger" href="/images/hotel/{{ $hotel->id }}">Upload now</a>
      </span>
      
    </div>
@endif
@endif
@if ($hotel)
@if ($hotel->status=='rooms')
    <div class="container alert alert-danger">
      <strong>Important!</strong> You have an hotel but you have not yet created rooms
      <span class="pull-right">
      <form action="{{ route('hotels.room') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{ $hotel->id }}">
          <input type="submit" class="btn btn-danger" value="Create rooms">
        </form>
      </span>
      
    </div>
    
@endif
@endif

<div class="row">
    <div class="col-md-8">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Hotel Bookings</h3>
                <span><a class="btn btn-success pull-right" href="/bookhotels">View all</a></span>
            </div>
            <div class="box-body table-responsive ">
                @if (count($hotel_bookings)>0)
                    
                    <table class="table">
                        <tbody>
                            <tr>
                            <th># Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Room no.</th>
                            <th>Check in</th>
                            <th>Check out</th>
                            <th>Amount</th>
                            <th>Status</th>
                          </tr>
            
                        @foreach ($hotel_bookings as $booking)
                        <tr>
                            <td># {{ $booking->id }}</td>
                            <td>{{ $booking->name }}</td>
                            <td><span class="badge bg-blue">{{ $booking->room_no }}</span></td>
                            {{-- <td><a  href="/sites/{{ $booking->site_id }}">{{ $booking->site_name }}</a></td> --}}
                            <td>{{ $booking->email }}</td>
                            <td>{{ $booking->check_in }}</td>
                            <td>{{ $booking->check_out }}</td>
                            <td>US$ {{ $booking->amount }}</td>
                            <td><span class="badge bg-blue">{{ $booking->status }}</span></td>

                            {{-- <td><a class="btn btn-success fa fa-send" href="/booksites/{{ $booking->id }}"></a></td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="container-fluid text-center">
                    {{ $hotel_bookings->links() }}
                </div>
            @else
                <p>You have not yet booked an attraction site <a href="/hotels">Click here</a>  to select an hotel then book</p>
            @endif
            
        </div>
        
    </div>
    <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">My site Reviews</h3>
          <div class="box-body">
            
              @if (count($reviews)>0)
                @foreach ($reviews as $review)
                <div class="box-footer box-comments">
                    <div class="box-comment">
                      <!-- User image -->
                      <img class="img-circle img-sm" src="/storage/images/profiles/profile.jpg" alt="User Image">
      
                      <div class="comment-text">
                            <span class="username ">
                              {{ $review->user_name }}
                              <span class="text-info pull-right">{{ $review->created_at }}</span>
                            </span><!-- /.username -->
                       <span >{{ $review->review }}</span>
                      </div>
                      <!-- /.comment-text -->
                    
                     @if ($review->status=='ready')
                      <form action="{{ route('testimonials.unpublish') }}" method="post">
                          {{ csrf_field() }}
                          <input type="hidden" name="id" value="{{ $review->id }}">
                          <button type="submit" class="btn btn-success pull-right">Unpublish <i class="fa fa-remove"></i> </button>
                      
                      </form>
                      @else
                      <form action="{{ route('testimonials.publish') }}" method="post">
                          {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $review->id }}">
                        <button type="submit" class="btn btn-success pull-right">Publish <i class="fa fa-check"></i> </button>
                     
                      </form>
                     @endif
                    <span class="pull-right w3-padding" >{{ $review->status }} for viewing  </span>
                    </div>
                    <!-- /.box-comment -->
                  </div><br>
                @endforeach
                <div class="container-fluid text-center">
                  {{ $reviews->links() }}
                </div>
              @else
                  <div class="container-fluid text-center">
                    <div class="alert alert-warning">
                        <p><b>Currently no reviews. Enter custom details below to Create Testimonials</b></p>
                    </div>
                    
                  </div>
              @endif
              
              <hr>
                  <h3 class="box-title">Write a custom review</h3>
              <hr>
              <div class="container-fluid">
                <form action="{{ route('testimonials.review') }}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" class="form-control" name="testi_type" value="hotel" >
                  <input type="hidden" class="form-control" name="id" value="{{ $hotel->id }}">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="">Enter name to appear</label>
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <input required type="text" name="name" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="">Testimonial</label>
                        <textarea required class="form-control" name="testimonial" id="" cols="" rows=""></textarea>
                      </div>
                      <button type="submit" class="btn btn-success pull-right fa fa">Publish <i class="fa fa-send"></i> </button>
                    </form>
              </div>
          </div>
           
        </div>
      </div>
    </div>
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="/storage/images/profiles/profile.jpg" alt="User profile picture">

                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                <p class="text-muted text-center">Manager</p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Email</b> <a class="pull-right">{{ Auth::user()->email }}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Attraction site bookings</b> <a class="pull-right">{{ count($hotel_bookings) }}</a>
                    </li>
                    {{-- <li class="list-group-item">
                        <b>Hotel bookings</b> <a class="pull-right">{{ count($hotel_bookings) }}</a>
                    </li> --}}
                </ul>
                <h4 class="text-center">We are proud of you <a href="/">Mamaland</a> </h4>

            </div>
            <!-- /.box-body -->
        </div>
        <div class="box box-success">
            <div class="box-header text-center">
                <h3 class="box-title ">Contact Administrator</h3>
            </div>
            <div class="box-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Type a message</label>
                        <textarea class="form-control" name="message" id="" cols="" rows=""></textarea>
                        <div class="container-fluid">
                            <br>
                            <input type="submit" class="btn btn-success pull-right" value="Send">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- box for nearest national park --}}

        <div class="box box-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-aqua">
            
            <!-- /.widget-user-image -->
            <h3 class="widget-user-username">{{ $near_site->name }}</h3>
            <h5 class="widget-user-desc">{{ $near_site->slag }}</h5>
          </div>
          <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
              <li><a>Phone<span class="pull-right badge bg-blue">{{ $near_site->phone }}</span></a></li>
              <li><a>Email <span class="pull-right badge bg-aqua">{{ $near_site->email }}</span></a></li>
              <li><a>Adress<span class="pull-right badge bg-green">{{ $near_site->address }}</span></a></li>
              <li><a>State <span class="pull-right badge bg-red">{{ $near_site->state }}</span></a></li>
            </ul>
          </div>
        </div>

    </div>
  </div>



@endsection