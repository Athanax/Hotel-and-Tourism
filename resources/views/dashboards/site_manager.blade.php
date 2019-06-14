@extends('layouts.app')

@section('content')
@if ($site)
@if ($site->status=='rates')
<div class="alert alert-danger">
    <strong>Important!</strong> You are required to set rates for your new attraction site otherwise no one will be able to view it!&nbsp;&nbsp; 
    <a href="/sites/rates/{{ $site->id }}" class="btn btn-danger">Create now</a>
  </div>
  
@endif
@endif

@if ($site)
@if ($site->status=='images')
<div class="alert alert-danger">
    <strong>Important!</strong> You are required to upload images for your new attraction site otherwise no one will be able to view it!&nbsp;&nbsp; 
    <a href="/sites/images/{{ $site->id }}" class="btn btn-danger">Upload now</a>
  </div>
  
@endif
@endif

<div class="row">
  <div class="col-md-8">
    


<div class="box box-success">
  <div class="box-header">
      <h3 class="box-title">Attraction site Bookings</h3>
      <span><a class="btn btn-success pull-right" href="/booksites">View all</a></span>
  </div>
  <div class="box-body table-responsive ">
      @if (count($site_bookings)>0)
          
          <table class="table">
              <tbody>
                  <tr>
                  <th># Id</th>
                  <th>Site id</th>
                  <th>Site name</th>
                  <th>Tourist name</th>
                  <th>Duration</th>
                  <th>Created</th>
                  <th>Amount</th>
                  <th>Status</th>
              </tr>
  
              @foreach ($site_bookings as $booking)
              <tr>
                  <td># {{ $booking->id }}</td>
                  <td>{{ $booking->site_id }}</td>
                  <td><a  href="/sites/{{ $booking->site_id }}">{{ $booking->site_name }}</a></td>
                  <td>{{ $booking->user_name }}</td>
                  <td>{{ $booking->duration }}</span></td>
                  <td>{{ $booking->created_at }}</td>
                  <td>{{ $booking->amount }}</td>
                  <td><span class="badge bg-blue">{{ $booking->status }}</span></td>
                  <td><a class="btn btn-success fa fa-send" href="/booksites/{{ $booking->id }}"></a></td>
              </tr>
              @endforeach
          </tbody>
      </table>
      <div class="container-fluid text-center">
          {{ $site_bookings->links() }}
      </div>
  @else
      <p>You have not yet booked an attraction site <a href="/sites">Click here</a>  to select an hotel then book</p>
  @endif
</div>
</div>



<div class="box box-info">
  <div class="box-header">
      <h3 class="box-title">My site Reviews</h3>
  </div>
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
              <button type="submit" class="btn btn-success pull-right">Publish <i class="fa fa-remove"></i> </button>
              
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
<input type="hidden" class="form-control" name="testi_type" value="site" >
<input type="hidden" class="form-control" name="id" value="{{ $site->id }}">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Enter name to appear</label>
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <input type="text" name="name" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="">Testimonial</label>
        <textarea class="form-control" name="testimonial" id="" cols="" rows=""></textarea>
    </div>
    <input type="submit" class="btn btn-success pull-right" value="Publish">
</form>
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
                <b>Attraction site bookings</b> <a class="pull-right">{{ count($site_bookings) }}</a>
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
        <div class="box-header">
            <h3 class="box-title">Contact Administrator</h3>
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
    <div class="box box-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="box-header bg-aqua">
        
        <!-- /.widget-user-image -->
        <h3 class="box-title">Nearby hotels</h3>
      </div>
      <div class="box-footer no-padding">
        <ul class="nav nav-stacked">
          @if (count($near_hotels)>0)
            @foreach ($near_hotels as $hotel)
           <li><a href="/hotels/{{ $hotel->id }}">{{ $hotel->name }}</a></li>

          @endforeach
          @else
            <div class="container-fluid text-center w3-padding">
              <p>Currently no nearby Hotel</p>
            </div> 
          @endif
          
        </ul>
      </div>
    </div>


</div>



@endsection