@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header text-center">
                    <h3 class="box-title">All Hotels</h3>
                    @if (count($hotels)>0)
                    <div class="container-fluid table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Nearest site</th>
                                    <th>manager Id</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($hotels as $hotel)
                                <tr>
                                    <td>{{ $hotel->id }}</td>
                                    <td>{{ $hotel->name }}</td>
                                    <td>{{ $hotel->type }}</td>
                                    <td>{{ $hotel->state }}</td>
                                    <td>{{ $hotel->country }}</td>
                                    <td>{{ $hotel->site_id }}</td>
                                    <td>{{ $hotel->user_id }}</td>
                                    <td>{{ $hotel->email }}</td>
                                    <td><a class="btn btn-success fa fa-send" href="/hotels/{{ $hotel->id }}"></a></td>

                                    
                                </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="container-fluid text-center">
                        {{ $hotels->links() }}
                    </div>
                    @else
                    <div class="container-fluid text-center">
                        <br>
                        <div class="alert alert-warning">
                            <strong>Currently no Hotels</strong>
                        </div>
                        
                    </div>
                    @endif
                </div>
            </div>


            

            <div class="box box-primary">
                    <div class="box-header text-center">
                        <h3 class="box-title">All Sites</h3>
                        @if (count($sites)>0)
                        <div class="container-fluid table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>State</th>
                                        <th>Country</th>
                                        <th>Manager Id</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($sites as $site)
                                    <tr>
                                        <td>{{ $site->id }}</td>
                                        <td>{{ $site->name }}</td>
                                        <td>{{ $site->type }}</td>
                                        <td>{{ $site->state }}</td>
                                        <td>{{ $site->counrty }}</td>
                                        <td>{{ $site->user_id }}</td>
                                        <td>{{ $site->email }}</td>
                                        <td><a class="btn btn-success fa fa-send" href="/sites/{{ $site->id }}"></a></td>
                                        
                                    </tr>
                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="container-fluid text-center">
                            {{ $sites->links() }}
                        </div>
                        @else
                        <div class="container-fluid text-center">
                            <br>
                            <div class="alert alert-warning">
                                <strong>Currently no Sites</strong>
                            </div>
                            
                        </div>
                        @endif
                    </div>
                </div>



                <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">Hotel Bookings</h3>
                            <span><a class="btn btn-success pull-right" href="/bookhotels">View all</a></span>
                        </div>
                        <div class="box-body table-responsive ">
                            @if (count($hotel_bookings)>0)
                                
                                <table class="table">
                                    <tbody>
                                        <tr>
                                        <th># Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Room no.</th>
                                        <th>Check in</th>
                                        <th>Check out</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                      </tr>
                        
                                    @foreach ($hotel_bookings as $booking)
                                    <tr>
                                        <td># {{ $booking->id }}</td>
                                        <td>{{ $booking->name }}</td>
                                        <td><span class="badge bg-blue">{{ $booking->room_no }}</span></td>
                                        {{-- <td><a  href="/sites/{{ $booking->site_id }}">{{ $booking->site_name }}</a></td> --}}
                                        <td>{{ $booking->email }}</td>
                                        <td>{{ $booking->check_in }}</td>
                                        <td>{{ $booking->check_out }}</td>
                                        <td>US$ {{ $booking->amount }}</td>
                                        <td><span class="badge bg-blue">{{ $booking->status }}</span></td>
            
                                        {{-- <td><a class="btn btn-success fa fa-send" href="/booksites/{{ $booking->id }}"></a></td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="container-fluid text-center">
                                {{ $hotel_bookings->links() }}
                            </div>
                        @else
                            <p>You have not yet booked an attraction site <a href="/hotels">Click here</a>  to select an hotel then book</p>
                        @endif
                        
                    </div>
                    
                </div>

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
                
                <div class="box box-primary">
                    <div  class="box-header text-center">
                        <h3 class="box-title">Change role</h3>
                    </div>
                    <div class="box-body">
                        <div class="container-fluid">
                            <form action="{{ route('home.assign') }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Select a user</label>
                                            <select required class="form-control select2" name="user" id="">
                                                <option selected disabled></option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Select role</label>
                                            <select required class="form-control select2" name="role" id="">
                                                <option ></option>
                                                <option value="site_manager">Site manager</option>
                                                <option value="hotel_manager">Hotel manager</option>
                                                <option value="tourist">Tourist</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="padding-top:24px">
                                        <button class="btn btn-primary">Save <i class="fa fa-check"></i> </button>
                                    </div>
                                </div>
                                
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

            <p class="text-muted text-center">Administrator</p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Email</b> <a class="pull-right">{{ Auth::user()->email }}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Attraction site bookings</b> <a class="pull-right">{{ count($hotel_bookings) }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Hotel bookings</b> <a class="pull-right">{{ count($hotel_bookings) }}</a>
                    </li>
                </ul>
                <h4 class="text-center">We are proud of you <a href="/">Mamaland</a> </h4>

            </div>
            <!-- /.box-body -->
        </div>

        {{-- Tourists --}}
        <div class="box box-success">
            <div class="box-header text-center">
                <h3 class="box-title">Tourists</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                           <th>ID</th> 
                           <th>Name</th> 
                           <th>Email</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($tourists)>0)
                            
                            @foreach ($tourists as $tourist)
                            
                                <tr>
                                    <td>{{ $tourist->id }}</td>
                                    <td>{{ $tourist->name }}</td>
                                    <td>{{ $tourist->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        <div class="container-fluid text-center">
                            {{ $tourists->links() }}
                        </div>
                    @else
                    <div class="container-fluid text-center">
                            <br>
                            <div class="alert alert-warning">
                                <strong>Currently no Tourists</strong>
                            </div>
                            
                        </div>
                    @endif

                    
            </div>
        </div>

         {{-- Hotel managers --}}
         <div class="box box-success">
                <div class="box-header text-center">
                    <h3 class="box-title">Hotel managers</h3>
                </div>
                <div class="box-body table-responsive">
                    @if (count($hotel_managers)>0)
                    <table class="table">
                        <thead>
                            <tr>
                               <th>ID</th> 
                               <th>Name</th> 
                               <th>Email</th> 
                            </tr>
                        </thead>
                        <tbody>
                            
                                
                                @foreach ($hotel_managers as $manager)
                                
                                    <tr>
                                        <td>{{ $manager->id }}</td>
                                        <td>{{ $manager->name }}</td>
                                        <td>{{ $manager->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                            <div class="container-fluid text-center">
                                {{ $hotel_managers->links() }}
                            </div>
                        @else
                        <div class="container-fluid text-center">
                            <br>
                            <div class="alert alert-warning">
                                <strong>Currently no Hotels managers</strong>
                            </div>
                            
                        </div>
                        @endif
    
                </div>
                </div>



         {{-- Site managers --}}
         <div class="box box-success">
                <div class="box-header text-center">
                    <h3 class="box-title">Site managers</h3>
                </div>
                <div class="box-body table-responsive">
                    @if (count($site_managers)>0)
                    <table class="table">
                        <thead>
                            <tr>
                               <th>ID</th> 
                               <th>Name</th> 
                               <th>Email</th> 
                            </tr>
                        </thead>
                        <tbody>
                            
                                
                                @foreach ($site_managers as $manager)
                                
                                    <tr>
                                        <td>{{ $manager->id }}</td>
                                        <td>{{ $manager->name }}</td>
                                        <td>{{ $manager->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                            <div class="container-fluid text-center">
                                {{ $site_managers->links() }}
                            </div>
                        @else
                        <div class="container-fluid text-center">
                            <br>
                            <div class="alert alert-warning">
                                <strong>Currently no Hotels managers</strong>
                            </div>
                            
                        </div>
                        @endif
    
                </div>
                </div>
            <div class="box box-primary">
                <div class="box-header text-center">
                    <h3 class="box-title">Recent Messages</h3>
                </div>
                <div class="box-body">
                        <ul class="products-list product-list-in-box">
                                @if (count($messages)>0)
                                    @foreach ($messages as $message)
                                        <!-- /.item -->
                                        <li class="item">
                                        
                                            <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">{{ $message->subject }}
                                            <span class="label label-info pull-right">{{ $message->email }}</span></a>
                                            <span class="product-descrption">
                                                    {{ $message->message }}
                                                </span>
                                            </div>
                                        </li>
                                    
                                    @endforeach
                                @else
                                    
                                <div class="container-fluid">
                                    <div class="alert alert-warning">
                                        <strong>Currently no Messages</strong>
                                    </div>
                                </div>

                                @endif
                                
                              </ul>
                </div>
            </div>
        </div>
        
    </div>
@endsection