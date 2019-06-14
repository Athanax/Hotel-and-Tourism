@extends('layouts.app')

@section('content')
    <div class=" row">
        <div class="col-md-8 col-sm-8">
            <div class="box box-widget ">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua w3-padding">
                    
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">{{$booking->user_name}}</h3>
                    <h5 class="widget-user-desc">{{$booking->email}}</h5>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                    <li><a href="#">Transaction ID <span class="pull-right  ">#{{$booking->id}}</span></a></li>
                    <li><a href="#">User ID <span class="pull-right  ">#{{$booking->user_id}}</span></a></li>
                    <li><a href="#">User name<span class="pull-right ">{{$booking->user_name}}</span></a></li>
                    <li><a href="#">Attraction ID<span class="pull-right ">#{{$booking->id}}</span></a></li>
                    <li><a href="#">Attraction name<span class="pull-right  ">{{$booking->site_name}}</span></a></li>
                    <li><a href="#">Country<span class="pull-right  ">{{$booking->country}}</span></a></li>
                    <li><a href="#">Address<span class="pull-right ">{{$booking->address}}</span></a></li>
                    <li><a href="#">Phone <span class="pull-right ">{{$booking->phone}}</span></a></li><li>
                    <li><a href="#">Children <span class="pull-right  ">{{$booking->children}} child(s)</span></a></li>
                    <li><a href="#">Adults<span class="pull-right ">{{$booking->adults}} adult(s)</span></a></li>
                    <li><a href="#">Number of days <span class="pull-right ">{{$booking->duration}} days(s)</span></a></li>
                    <li><a href="#">Nationality <span class="pull-right  ">
                        
                        @if ($booking->nationality==2)
                            Resident
                        @elseif($booking->nationality==3)
                            Non Resident
                        @else
                            Citizen
                        @endif
                    </span></a></li>
                    <li><a href="#">Entry fee<span class="pull-right ">{{$booking->amount}}</span></a></li>
                    <li><a href="#">Status <span class="pull-right ">{{$booking->status}}</span></a></li>
                    <li><a href="#">Created on <span class="pull-right ">{{$booking->created_at}}</span></a></li>
                    <li><a href="#">Updated on <span class="pull-right ">{{$booking->updated_at}}</span></a></li>

                    
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="box box-widget">
                <ul class="nav nav-stacked">

                    @if ( Auth::user()->role == 'site_manager')
                        <li class="btn btn-info">  
                            <form action="{{route('booksite.visit')}}" method="post">
                                    {{csrf_field()}}
                                <input type="hidden" value="{{ $booking->id }}" name="id">
                                <input  class="bg-aqua  w3-hover-white" style="border:none; width:100%; padding:10px" type="submit" value="Accept Visit">
                            </form>
                        </li>

                    @endif
                    @if (Auth::user()->id==$booking->user_id or Auth::user()->role == 'admin' or Auth::user()->role == 'site_manager' )
                        <li class="btn btn-info"><a href="/booksites">View all Transctions</a></li>
                        <li class="btn btn-info"><a href="/booksites/{{ $booking->id }}/edit">Edit Transaction</a></li>
                        
                        <li class="btn btn-info">
                                    
                            <form action="{{route('booksite.cancel')}}" method="post">
                                    {{csrf_field()}}
                                <input type="hidden" value="{{ $booking->id }}" name="id">
                                <input  class="bg-aqua w3-hover-red" style="border:none; width:100%; padding:10px" type="submit" value="Cancel Transaction">
                            </form>
                        </li>
                        
                    @endif

                </ul>     
                    
 
                    
            </div>
            

        </div>
        
    </div>
@endsection