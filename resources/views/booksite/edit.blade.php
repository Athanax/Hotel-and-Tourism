@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
                <form name="form_1" action="{{ route('booksites.update', [$booking->id]) }}" method="post">
                        {{ csrf_field() }}
                        <fieldset>
                            <legend>Edit booking - {{$booking->site_name}}</legend>
                           
                            <h6 class="col-md-offset-4">Payment</h6>
                            <input type="hidden" name="_method" value="put">
                            <div class="row" style="padding-top:0; padding-bottom:0">
                            
                                <div class="col-md-4">
                                    <div class="form-group text-right">
                                        <label for="">Nationality</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <select readonly disabled class="form-control" name="nationality" required id="nationality">
                                        
                                        <option selected value="{{$booking->site_name}}">Resident</option>
                                        
                                    </select>
                                </div>
                            </div>
        
                            <div class="row" style="padding-top:0; padding-bottom:0">
                            
                                <div class="col-md-4">
                                    <div class="form-group text-right">
                                        <label for="">ID number/Passport number</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <input readonly disabled required type="number" min="0" placeholder="1234567890" class="form-control" name="id_no">
                                </div>
                            </div>
        
                            <small>Payment can only done via Credit Card</small>
                            <div class="row" style="padding-top:0; padding-bottom:0">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="" for="">Children</label>
                                        <small>&nbsp;( 17 years and below. )</small>
                                        <input value="{{$booking->children}}" placeholder="Type number of children..." id="child" required class="form-control" type="number" min="0"  name="child">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="" for="">Adults</label>
                                        <small> &nbsp;( 18 years and above. )</small>
                                        <input value="{{$booking->adults}}" placeholder="Type number of adults..." id="adult" required class="form-control" type="number" min="0"  name="adult">
                                    </div>
                                </div>
                            </div>
        
                            <div class="row" style="padding-top:0; padding-bottom:0">
                            
                                <div class="col-md-4">
                                    <div class="form-group text-right">
                                        <label for="">No of days</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{$booking->duration}}"  id="duration" required type="number" min="0" placeholder="2" class="form-control" name="duration">
                                </div>
                            </div>
        
                            <small class="col-md-offset-4">Fill the card details as indicated</small>
                            <div class="row" style="padding-top:0; padding-bottom:0">
                                
                                <div class="col-md-4">
                                    <div class="form-group text-right">
                                        <label class="text-center" for="">Card Holder's Name</label>
                                        
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <input placeholder="Eg. Charles Daniel" type="text" required name="holder_name" class="form-control">
                                    
                                </div>
                            </div>
        
                            <div class="row" style="padding-top:0; padding-bottom:0">
                                
                                <div class="col-md-4">
                                    <div class="form-group text-right">
                                        <label class="text-center" for="">Card number</label>
                                        
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <input placeholder="1234-4567-7890-7654" type="text" required name="card_number" class="form-control">
                                    
                                </div>
                            </div>
                            <div class="row" style="padding-top:0; padding-bottom:0">
                                
                                <div class="col-md-4">
                                    <div class="form-group text-right">
                                        <label class="text-center" for="">Expiry date</label>
                                        
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <input placeholder="01/10/2000" type="date" required name="expiry_date" class="form-control">
                                </div>
                            </div>
                            <div class="row" style="padding-top:0; padding-bottom:0">
                                
                                <div class="col-md-4">
                                    <div class="form-group text-right">
                                        <label class="text-center" for="">CVV</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <input placeholder="345" maxlength="3" type="number" required name="cvv_number" class="form-control">
                                </div>
                            </div>
                            <div class="row" style="padding-top:0; padding-bottom:0">
                            
                                <div class="col-md-4">
                                    <div class="form-group text-right">
                                            <h4 style="font-size: 25px; text-align: right" class="essay-font">Entry fee: </h4>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6><input class="tcost" style="border: none; width: 100px; font-size: 25px" type="text" name="amount" id="min-amount" value="{{ $booking->amount }}" readonly="readonly"></h6>
                                </div>
                            </div>
                            <input type="hidden" readonly id="resident_child" name="resident_child" value="{{ $rate->resident_child }}">
                            <input type="hidden" readonly id="resident_adult" name="resident_adult" value="{{ $rate->resident_adult }}">
                            <input type="hidden" readonly id="non_resident_child" name="non_resident_child" value="{{ $rate->non_resident_child }}">
                            <input type="hidden" readonly id="non_resident_adult" name="non_resident_adult" value="{{ $rate->non_resident_adult }}">
                            <input type="hidden" readonly id="citizen_child" name="citizen_child" value="{{ $rate->citizen_child }}">
                            <input type="hidden" readonly id="citizen_adult" name="citizen_adult" value="{{ $rate->citizen_adult }}">
                            <br>
                            <input type="hidden" class="form-control" value="{{ $booking->id }}" name="site_id">
                            <input type="hidden" class="form-control" name="site_name" value="{{ $booking->name }}">
                            <input type="hidden" class="form-control" value="{{ $booking->adults }}" name="n_adult">
                            <input type="hidden" class="form-control" name="n_child" value="{{ $booking->children }}">
        
                            <input class="btn btn-primary pull-right" style="background-color:#e74c3c;" type="submit">
                        </fieldset>            
                        
                    </form>
        </div>
        <div class="col-md-4">

        </div>
    </div>

    
@endsection
