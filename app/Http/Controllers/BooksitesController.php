<?php

namespace App\Http\Controllers;

use App\Booksite;
use App\Site;
use App\User;
use App\Hotel;
use App\Siterate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BooksitesController extends Controller
{
    public function __construct() { 
        $this->middleware('auth',['except' => ['create','store']]); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        if (Auth::user()) {
            
            if (Auth::user()->role=='tourist') {
                $book = Booksite::where('user_id', Auth::user()->id)
                    ->orderBy('id','desc')
                    ->paginate(10);
                return view('booksite.index')
                    ->with('bookings', $book);
            }elseif(Auth::user()->role=='site_manager'){
                $site = Site::where('user_id', Auth::user()->id)
                    ->first();
                $book = Booksite::where('site_id', $site->id)
                    ->orderBy('id','desc')
                    ->paginate(10);
                return view('booksite.index')
                    ->with('bookings', $book);
            }elseif(Auth::user()->role=='admin'){
                $book = Booksite::all()
                    ->orderBy('id','desc')
                    ->paginate(10);
                return view('booksite.index')
                    ->with('bookings', $book);
            }
            return back();
        }
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $hotels = Hotel::where('status', 'ready')->get();

        // $pass = Hash::make('athanas');
        $site_id = $request->input('site_id');
        //return $site_id;
        $rate = Siterate::where('site_id', $site_id)
            ->first();
        
        $site = Site::where('id', $site_id)
            ->first();
        
        $sites = Site::where('status', 'ready')
            ->get();
        if (Auth::user()) {
            return view('booksite.create')
            ->with('hotels', $hotels)
            ->with('attractions', $sites)
            ->with('rate', $rate)
            ->with('site', $site)
            ->with('details',Auth::user());
        }else{
            return view('booksite.create')
            ->with('hotels', $hotels)
            ->with('site', $site)
            ->with('attractions', $sites)
            ->with('rate', $rate);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return $request;
        if (Auth::user()) {
            $book = new Booksite;
            $book->site_id = $request->input('site_id');
            $book->site_name = $request->input('site_name');
            $book->user_id = Auth::user()->id;
            $book->user_name = Auth::user()->name;
            $book->country = Auth::user()->country;
            $book->email = Auth::user()->email;
            $book->address = Auth::user()->address;
            $book->phone = Auth::user()->phone;
            $book->children = $request->input('child');
            $book->adults = $request->input('adult');
            $book->duration = $request->input('duration');
            $book->id_no = $request->input('id_no');
            $book->nationality = $request->input('nationality');
            $book->holder_name = $request->input('holder_name');
            $book->card_number = $request->input('card_number');
            $book->expiry_date = $request->input('expiry_date');
            $book->cvv_number = $request->input('cvv_number');
            $book->amount = $request->input('amount');
            
            // return $book;

            $book->save();

            return redirect()
                ->route('home')
                ->with('Your booking is Successfull. Click Bookings to view');
        }else{

            $ck_user = User::where('email', $request->input('email'))->first();
            
            //return $ck_user;
            if ($ck_user) {
                
                $book = new Booksite;
                $book->site_id = $request->input('site_id');
                $book->site_name = $request->input('site_name');
                $book->user_id = $ck_user->id;
                $book->user_name = $ck_user->name;
                $book->country = $ck_user->country;
                $book->email = $ck_user->email;
                $book->address = $ck_user->address;
                $book->phone = $ck_user->phone;
                $book->children = $request->input('child');
                $book->adults = $request->input('adult');
                $book->duration = $request->input('duration');
                $book->id_no = $request->input('id_no');
                $book->nationality = $request->input('nationality');
                $book->holder_name = $request->input('holder_name');
                $book->card_number = $request->input('card_number');
                $book->expiry_date = $request->input('expiry_date');
                $book->cvv_number = $request->input('cvv_number');
                $book->amount = $request->input('amount');
                // return $book;
                
                $book->save();

                return redirect()
                    ->route('login')
                    ->with('success', 'You have successfully made a booking. Login to view details');
            }else{
                
                $user_new = new User;
                $user_new->name = $request->input('f_name').' '.$request->input('s_name');
                $user_new->email = $request->input('email');
                $user_new->password = Hash::make($request->input('f_name'));
                //return $user->password;
                $user_new->country = $request->input('country');
                $user_new->address = $request->input('address');
                $user_new->phone = $request->input('phone');

                $user_new->save();

                // $user=User::where('email', $user_new->email);

                $book = new Booksite;
                $book->site_name = $request->input('site_name');
                $book->site_id = $request->input('site_id');
                $book->user_id = $user_new->id;
                $book->user_name = $user_new->name;
                $book->country = $user_new->country;
                $book->email = $user_new->email;
                $book->address = $user_new->address;
                $book->phone = $user_new->phone;
                $book->children = $request->input('child');
                $book->adults = $request->input('adult');
                $book->duration = $request->input('duration');
                $book->id_no = $request->input('id_no');
                $book->nationality = $request->input('nationality');
                $book->holder_name = $request->input('holder_name');
                $book->card_number = $request->input('card_number');
                $book->expiry_date = $request->input('expiry_date');
                $book->cvv_number = $request->input('cvv_number');
                $book->amount = $request->input('amount');
                
                $book->save();

                return redirect()
                    ->route('login')
                    ->with('success', 'You have successfully made a booking. 
                    Enter the email you provided and first name as password in the login credentials to view booking details.');
            
            }
            
            
        }
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booksite  $booksite
     * @return \Illuminate\Http\Response
     */
    public function show(Booksite $booksite)
    {
        //
        
        if (Auth::user()) {
            if (Auth::user()->id== $booksite->user_id or Auth::user()->role == 'admin' or Auth::user()->role == 'site_manager' ) {
                return view('booksite.show')
                    ->with('booking', $booksite);
            }
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booksite  $booksite
     * @return \Illuminate\Http\Response
     */
    public function edit(Booksite $booksite)
    {
        //
        if (Auth::user()) {
            if (Auth::user()->id== $booksite->user_id or Auth::user()->role == 'admin' or Auth::user()->role == 'site_manager' ) {
                $rate = Siterate::where('site_id', $booksite->site_id)
                    ->first();
                return view('booksite.edit')
                    ->with('rate', $rate)
                    ->with('booking', $booksite);
            }
            return back();
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booksite  $booksite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booksite $booksite)
    {
        //
        $booksite->children =$request->input('child');
        $booksite->adults=$request->input('adult');
        $booksite->holder_name=$request->input('holder_name');
        $booksite->card_number=$request->input('card_number');
        $booksite->expiry_date=$request->input('expiry_date');
        $booksite->cvv_number=$request->input('cvv_number');

        $booksite->save();

        return redirect()->route('booksites.show',['booksite'=>$booksite])->with('success', 'Changes have been updated successfully');
    }
    /**
    * This function sets a booking to visited when a tourist visits an attraction site
    *
    *It can only be accessed by the site manager or the Administrator
    * 
    */
    

    public function visit(Request $request)
    {
        //
        
        if (Auth::user()->role=='site_manager' || Auth::user()->role=='admin') {
            $book_id = $request->input('id');
            $set_visited = Booksite::where('id', $book_id)->where('status', 'completed')->first();
            if (!$set_visited) {
                return back()->with('error', 'This Transaction was cancelled or its already visited');
            }

            $set_visited->status = 'visited';
            $set_visited->save();

            return redirect()->route('booksites.show', ['booksite'=>$set_visited]);
                
        }
        return back();

    }


    /**
     * This resource cancels a conducted transaction
     * 
     * Only the owner of the transaction can cancel a transaction.
     * 
     */

    public function cancel(Request $request)
    {
        //
        $book_id = $request->input('id');
        $booking = Booksite::where('id', $book_id)->first();
        if (Auth::user()->id==$booking->user_id) {
            //return $booking;
            $booking->status = 'cancelled';

            $booking->save();

            return redirect()->route('booksites.show',['booksite'=>$booking]);
        }
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booksite  $booksite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booksite $booksite)
    {
        //
    }
}
