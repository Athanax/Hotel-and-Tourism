@extends('inc.hotel')

@section('content')
    
    <!-- Rooms Area Start -->
    <div class="roberto-rooms-area section-padding-100-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        @if (count($rooms)>0)
                        
                            @foreach ($rooms as $room)
                            {{-- {{ $room->image }} --}}
                                <!-- Single Room Area -->
                                <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                                        <!-- Room Thumbnail -->
                                        <div class="room-thumbnail">
                                            <img src="/storage/uploads/hotels/rooms/{{ $room->image }}" alt="">
                                        </div>
                                        <!-- Room Content -->
                                        <div class="room-content">
                                            <h2>{{ $room->size_type }}</h2>
                                            <h4>$ {{ $room->cost }} <span>/ Day</span></h4>
                                            <div class="room-feature">
                                                <h6>Size: <span>{{ $room->size }}</span></h6>
                                                <h6>Bed: <span> {{ $room->beds }}</span></h6>
                                            </div>
                                            <div class="row">
                                                    <div class="col-6">
                                                        <form action="{{ route('hotels.pay') }}" method="POST">
                                                            {{ csrf_field() }}
                                                           
                                                            <input readonly required type="hidden" value="{{ $room->room_no }}" name="room_no">
                                                            <input readonly required type="hidden" value="{{ $room->hotel_id }}" name="hotel_id">
                                                            <input readonly required type="hidden" value="{{ $room->id }}" name="room_id">
                                                            <input readonly required type="hidden" value="{{$check['date']}}" name="dates">
                                                            <input readonly required type="submit" class="roberto-btn" name="" value="Book">

                                                        </form>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="#" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>

                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                
                            @endforeach
                        @else

                        <p>No Rooms According to Specified search. You may type diffrent dates or number of rooms</p>
                            <p>Thank you!</p>
                        @endif
                      
                    </div>
                    
    
                    <div class="col-12 col-lg-4">
                        <!-- Hotel Reservation Area -->
                        <div class="hotel-reservation--area mb-100">
                            <form action="{{ route('hotels.check', ['id'=>$hotel->id]) }}" method="get">
                                <div class="form-group mb-30">
                                    <label for="checkInDate">Date</label>
                                    <div class="input-daterange" id="datepicker">
                                        <div class="row no-gutters">
                                            <div class="col-12">
                                                <input type="text" value="{{$check['date']}}" class="input-small form-control" id="reservation" name="checkin" placeholder="Check In">
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

                                <div class="form-group mb-30">
                                    <label for="guests">Rooms</label>
                                    <div class="row">
                                        <div class="col-12">
                                            <select required name="rooms" id="guests" class="form-control">
                                                <option  disabled>Rooms</option>
                                                <option selected value="1">01 Rooms</option>
                                                <option value="2">02 Rooms</option>
                                                <option value="3">03 Rooms</option>
                                                <option value="4">04 Rooms</option>
                                                <option value="5">05 Rooms</option>
                                                <option value="6">06 Rooms</option>
                                                <option value="7">06 Rooms</option>

                                            </select>
                                        </div>
                                    
                                    </div>
                                </div>
                                <div class="form-group mb-50">
                                    <div class="slider-range">
                                        <div class="range-price">Max Price: $0 - $3000</div>
                                        <div data-min="0" data-max="3000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="0" data-value-max="3000" data-label-result="Max Price: ">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn roberto-btn w-100">Check Available</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Rooms Area End -->
@endsection