@extends('layouts.app')

@section('content')
    <div class="">
        
        @if (count($bookings)>0)
            
                
            <div class="box box-success" style="margin-top:0">
                <div class="text-center">
                    <h4>Your bookings</h4>
                </div>
                <div class="box-body table-responsive no-padding">
                        
                        <table class="table table-hover">
                        <tbody><tr>
                            <th>Transaction ID</th>
                            <th>User id</th>
                            <th>User name</th>
                            <th>Attraction id</th>
                            <th>Attraction name</th>
                            <th>Booking date</th>
                            <th>Children</th>
                            <th>Adults</th>
                            <th>Entry fee</th>
                            <th>Duration</th>
                            <th>Status</th>
                        </tr>
                        @foreach ($bookings as $booking)
                        <tr>
                            <td>#{{ $booking->id }}</td>
                            <td>{{ $booking->user_id }}</td>
                            <td>{{ $booking->user_name }}</td>
                            <td>{{ $booking->site_id }}</td>
                            <td>{{ $booking->site_name }}</td>
                            <td>{{ $booking->created_at }}</td>
                            <td>{{ $booking->children }}</td>
                            <td>{{ $booking->adults }}</td>
                            <td>{{ $booking->amount }}</td>
                            <td>{{ $booking->duration }} days</td>
                            <td><span class="label label-success"></span>{{ $booking->status }}</td>
                            <td><a class="btn btn-success" href="booksites/{{ $booking->id }}"> <span class="fa fa-send"></span></a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                    </div>
                    <div class="container text-center">
                        {{ $bookings->links() }}
                    </div>
            </div>

            
        
        @else

        <h6>Currently no bookings</h6>
            
        @endif
          
    </div>
@endsection