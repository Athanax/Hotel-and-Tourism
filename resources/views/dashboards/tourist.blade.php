@extends('layouts.app')

@section('content')
   <div class="row">
    <div class="col-md-8 ">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Hotel Bookings</h3>
            </div>
            <div class="box-body table-responsive ">
                @if (count($hotel_bookings)>0)
                    
                    <table class="table">
                            <tbody>
                            <tr>
                              <th># Id</th>
                              <th>Hotel</th>
                              <th>Room id</th>
                              <th>Room number</th>
                              <th>Check in</th>
                              <th>Check out</th>
                              <th>Amount</th>
                              <th>Status</th>
                              {{-- <th>View</th> --}}
                            </tr>
                            @foreach ($hotel_bookings as $booking)
                            <tr>
                              <td>#{{ $booking->id }}.</td>
                                <td><a  href="/hotels/{{ $booking->hotel_id }}">View hotel</a></td>
                              <td>
                                {{ $booking->room_id }}
                              </td>
                              <td><span class="badge bg-green">{{ $booking->room_no }}</span></td>
                              <td>{{ $booking->check_in }}</td>
                              <td>{{ $booking->check_out }}</td>
                              <td>{{ $booking->amount }}</td>
                              <td><span class="badge bg-blue">{{ $booking->status }}</span></td>
                              {{-- <td><a class="btn btn-success fa fa-send" href="/bookhotels/{{ $booking->id }}"></a></td> --}}
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    <div class="container-fluid text-center">
                        {{ $hotel_bookings->links() }}
                    </div>
                @else
                    <p>You have not yet booked a hotel. <a href="/hotels">Click here</a>  to select an hotel then book</p>
                @endif
                
            </div>
        </div>
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Attraction site Bookings</h3>
            </div>
            <div class="box-body table-responsive ">
                @if (count($site_bookings)>0)
                    
                    <table class="table">
                        <tbody>
                            <tr>
                            <th># Id</th>
                            <th>Site id</th>
                            <th>Site name</th>
                            
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
                            <td>{{ $booking->duration }}</span></td>
                            <td>{{ $booking->created_at }}</td>
                            <td>{{ $booking->amount }}</td>
                            {{-- <td>{{ $booking->amount }}</td> --}}
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


</div>
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="/storage/images/profiles/profile.jpg" alt="User profile picture">

                <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                <p class="text-muted text-center">Tourist</p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Email</b> <a class="pull-right">{{ Auth::user()->email }}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Attraction site bookings</b> <a class="pull-right">{{ count($site_bookings) }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Hotel bookings</b> <a class="pull-right">{{ count($hotel_bookings) }}</a>
                    </li>
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
    </div>

   
</div>
@endsection