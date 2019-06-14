@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row col-md-offset-1">
        <div class="col-md-10">
            <div class="box box-success">
                <div class="box-header">
                    <h4  class="text-center">{{ $hotel->name }}</h4>
                </div>
                <div class="box-body">
                    <form action="{{ route('hotels.store_room') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <input readonly required type="hidden" name="id" value="{{ $hotel->id }}">
                                <div class="form-group">
                                    <label for="">No of rooms</label>
                                    <input required type="number" class="form-control" name="no_of_rooms">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <select required class="form-control select2" name="name" id="">
                                        <option selected disabled >Select name of combination</option>
                                        <option value="Single room">Single room</option>
                                        <option value="Bed sitter">Bed sitter</option>
                                        <option value="Double Room">Double room</option>
                                        <option value="One Bedroom">One Bedroom</option>
                                        <option value="Two Bedroon">Two Bedroom</option>
                                        <option value="Three Bedroom">Three Bedroom</option>
                                        <option value="Four Bedroom">Four Bedroom</option>
                                        <option value="Five Bedroom">Five Bedroom</option>
                                        <option value="Six Bedroom">Six Bedroom</option>
                                        <option value="Seven Bedroom">Seven Bedroom</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Approx. size <small class="text-info">(sq ft)</small> </label>
                                    <input required type="number" class="form-control" name="size">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Room number</label>
                                    <input required type="text" class="form-control" name="room_no">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Amenities</label>
                                    <select required  class="form-control select2" name="amenities" id="">
                                        <option selected disabled >You can select multiple amenities</option>
                                        <option value="Balcony">Balcony</option>
                                        <option value="Bathroom">Bathroom</option>
                                        <option value="Hair Dryer">Hair Dryer</option>
                                        <option value="Wireless Internet">Wireless Internet</option>
                                        <option value="Cabled Internet">Cabled Internet</option>
                                        <option value="Sitting area">Sitting area</option>
                                        <option value="Minibar">Minibar</option>
                                        <option value="Private Bathroom">Private Bathroom</option>
                                        <option value="Various views">Various views</option>
                                        <option value="Television">Television</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Beds</label>
                                    <input required type="number" class="form-control" name="beds">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Cost per day</label>
                                    <input required type="number" class="form-control" name="cost">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input required type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>
        
                        <div class=" form-group">
                            <label for="">Description</label>
                            <textarea required name="description" class="form-control" id="" cols="" rows=""></textarea>
                        </div>
                        <div class="container-fluid">
                            <input required type="submit" class="btn btn-primary w3-btn-block" value="Create room">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection