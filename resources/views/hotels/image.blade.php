@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row col-md-offset-1">
            <div class="col-md-10">
                <form action="{{ route('hotels.img_store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box box-primary">
                        <div class="box-header text-center">
                            <h4>{{$hotel->name}}</h4> 
                            <hr>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Field</label>
                                        <input required class="form-control" type="text" placeholder="Eg. Entertainment, Accommodation..." name="field">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Activity</label>
                                        <input required class="form-control" type="text" placeholder="Eg. Swimming, Rooms, Cycling..." name="activity">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Brief description of the image</label>
                                <textarea required class="form-control" name="description" id="" cols="" rows=""></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input required type="file" name="image" class="form-control">
                            </div>
                            <input readonly type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary w3-btn-block">
                            </div>
                             
                        </div>
                        
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
@endsection