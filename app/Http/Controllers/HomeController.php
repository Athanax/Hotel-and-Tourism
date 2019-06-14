<?php

namespace App\Http\Controllers;
use App\Site;
use App\Hotel;
use App\Bookhotel;
use App\Booksite;
use App\Testimonial;
use App\User;
use App\Contact;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()) {

            if (Auth::user()->id == 1) {
                $user=User::where('id', 1)->first();

                $user->role='admin';
                $user->save();
                // return $user;
            }
            
            if (Auth::user()->role=='admin') {
                
                if (Auth::user()) {
                    $sites = Site::where('status', 'ready')->paginate(10);
                    // return $sites;
                    $users = User::all();

                    $messages = Contact::where('status', 'unread')->get();
                    
                    $tourists = User::where('role', 'tourist')
                        ->orderBy('id', 'desc')
                        ->paginate(15);

                    $hotel_managers = User::where('role', 'hotel_manager')
                        ->orderBy('id', 'desc')
                        ->paginate(15);

                    $site_managers = User::where('role', 'site_manager')
                        ->orderBy('id', 'desc')
                        ->paginate(15);
                    // return $tourists;
                    $site = Site::where('user_id', Auth::user()->id)
                        ->first();
                    
                    
                    $hotel = Hotel::where('user_id', Auth::user()->id)
                        ->first();

                    $hotels = Hotel::where('status', 'ready')
                        ->paginate(10);

                    $site_bookings = Booksite::where('status', 'complete')
                        ->orderBy('id', 'desc')
                        ->paginate(10);
                    $hotel_bookings = Bookhotel::where('status', 'complete' )
                        ->orderBy('id', 'desc')  
                        ->paginate(10);
        
                    return view('dashboards.admin')
                        ->with('users', $users)
                        ->with('site_managers',$site_managers)
                        ->with('tourists', $tourists)
                        ->with('hotel_managers', $hotel_managers)
                        ->with('hotels', $hotels)
                        ->with('hotel_bookings', $hotel_bookings)
                        ->with('site_bookings', $site_bookings)
                        ->with('sites', $sites)
                        ->with('hotel', $hotel)
                        ->with('messages', $messages)
                        ->with('site',$site);
                    
                   
                }


            }elseif (Auth::user()->role=='site_manager') {
                
                if (Auth::user()) {
                    
                    $site = Site::where('user_id', Auth::user()->id)
                        ->first();
                        // return count($site);
                    // return $site;
                    if (!$site) {
                        return redirect()->route('sites.create');
                    }
                    $site_bookings = Booksite::where('site_id', $site->id)
                        ->orderBy('id', 'desc')
                        ->paginate(10);

                    // return $site_bookings;
                    $reviews = Testimonial::where('testi_type', 'site')
                        ->where('testi_id', $site->id)
                        ->paginate(10);
                    //  return $reviews;

                    $near_hotels = Hotel::where('site_id', $site->id)
                        ->where('status', 'ready')
                        ->get();

                        // return $near_hotels;

                    return view('dashboards.site_manager')
                        ->with('near_hotels', $near_hotels)
                        ->with('site_bookings', $site_bookings)
                        ->with('reviews', $reviews)
                        ->with('site',$site);
                    
                }

            }elseif (Auth::user()->role=='hotel_manager') {
                
                if (Auth::user()) {
        
                    $hotel = Hotel::where('user_id', Auth::user()->id)
                        ->first();

                    if (!$hotel) {
                        return redirect()->route('hotels.create');
                    }

                    $hotel_bookings = Bookhotel::where('hotel_id', $hotel->id)->paginate(10);
        
                    // return $hotel_bookings;
                    $reviews = Testimonial::where('testi_type', 'hotel')
                        ->where('testi_id', $hotel->id)
                        ->paginate(10);
                    //  return $reviews;


                    $near_sites = Site::where('id', $hotel->site_id)
                        ->where('status', 'ready')->first();
                    
                    // return $near_sites;

                    return view('dashboards.hotel_manager')
                        ->with('near_site', $near_sites)
                        ->with('hotel_bookings', $hotel_bookings)
                        ->with('hotel', $hotel)
                        ->with('reviews',$reviews);
                    
                   
                }

            }elseif (Auth::user()->role=='tourist') {
                
                if (Auth::user()) {
                    $hotel_bookings = Bookhotel::where('user_id', Auth::user()->id)->paginate(7);
                    // return $hotel_bookings;
                    $site_bookings = Booksite::where('user_id', Auth::user()->id)->paginate(7);

                    // return $site_bookings;
                    $sites = Site::where('status', 'ready')->get();
                    //return $sites;
        
                    $site = Site::where('user_id', Auth::user()->id)
                        ->first();
        
                    $hotel = Hotel::where('user_id', Auth::user()->id)
                        ->first();
        
                    return view('dashboards.tourist ')
                        ->with('site_bookings', $site_bookings)
                        ->with('hotel_bookings', $hotel_bookings)
                        ;
                    
                   
                }

            }else {
                return redirect()->route('auth.create');
            }

        }else {
            return redirect()->route('auth.login');
        }
        
       
        
    }
}
