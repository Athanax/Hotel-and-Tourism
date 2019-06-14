@extends('layouts.app')

@section('content')
<div class="container">
    
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if (Auth::user()->role=='admin')
        <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>150</h3>
  
                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>
  
                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>44</h3>
  
                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>65</h3>
  
                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
    @endif
    @if ($site)
    @if ($site->status=='rates')
    <div class="alert alert-danger">
        <strong>Important!</strong> You are required to set rates for your new attraction site otherwise no one will be able to view it!&nbsp;&nbsp; 
        <a href="/siterates/create" class="btn btn-danger">Create now</a>
      </div>
    @endif
    @endif

    @if ($hotel)
        @if ($hotel->status=='images')
            <div class="container alert alert-danger">
              <strong>Important!</strong> You have an hotel but you have not uploaded images to allow users to be able to preview
              <span class="pull-right">
              <form action="{{ route('images.create') }}" method="get">
                  {{-- {{ csrf_field() }} --}}
                  <input type="hidden" name="id" value="{{ $hotel->id }}">
                  <input type="submit" class="btn btn-danger" value="Upload now">
                </form>
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
    
    
</div>
@endsection
