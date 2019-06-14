@extends('inc.hotel')

@section('content')
    
    <!-- Rooms Area Start -->
    <div class="roberto-rooms-area section-padding-100-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">
                       
                       <h2>Payment Information</h2>
                       <div class="hotel-reservation--area mb-100">
                       <form action="{{ route('hotels.book') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group mb-30">
                                <label for="checkInDate">Account number</label>
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <input required type="text" class="input-small form-control" name="account_number" placeholder="Check In">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <div class="form-group mb-30">
                                        <label for="checkInDate">expiry date</label>
                                        <div class="row no-gutters">
                                            <div class="col-12">
                                                <input required type="date" class="input-small form-control" name="expiry_date" placeholder="Check In">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group mb-30">
                                        <label for="checkInDate">CVV no.</label>
                                        <div class="row no-gutters">
                                            <div class="col-12">
                                                <input required type="text"  class="input-small form-control" name="cvv_no" placeholder="Check In">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-30">
                                <label for="checkInDate">Name on card</label>
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <input required type="text" class="input-small form-control" name="full_name" placeholder="Check In">
                                    </div> 
                                </div>
                            </div>
                            <input readonly required type="hidden" value="{{ $room->room_no }}" name="room_no">
                            <input readonly required type="hidden" value="{{ $room->hotel_id }}" name="hotel_id">
                            <input readonly required type="hidden" value="{{ $room->id }}" name="room_id">
                            <input readonly required type="hidden" value="{{$check['dates']}}" name="dates">
                            <input type="submit" class="btn roberto-btn pull-right" value="COMPLETE BOOKING">
                        </form>
                       </div>
                    </div>
                    
    
                    <div class="col-12 col-lg-4 single-widget-area mb-100">
                        <div class="container-fluid" style="background-color:#e8f1f8; padding-top:20px; border-radius:5px;padding-bottom:20px">
                                <h3>Your Stay</h3>
                                <div class="row">
                                    <div class="col-6">
                                       <b>Check-in</b>
                                       <p>After 12:00 noon</p>
                                    </div>
                                    <div class="col-6">
                                        <b>Check-out</b>
                                        <p>Before 12:00 noon</p>
                                    </div>
                                </div>
                                <p>{{ $check['checkin'] }} - {{ $check['checkout'] }}</p>
        
                            <a target="blank" href="/hotels/{{ $hotel->id }}"><h4>{{ $hotel->name }} - {{ $room->size_type }}</h4></a>
                            
                            {{ $check['days'] }} Days.
                            <br>
                            <div class="row">
                                <div class="col-6">
                                    <h3>Total: </h3>
                                </div>
                                <div class="col-6">
                                    <h4 class="pull-right">US$ {{ $check['cost'] }}</h4>
                                </div>
                            </div>

                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Rooms Area End -->
@endsection