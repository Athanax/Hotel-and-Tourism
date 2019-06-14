<?php

namespace App\Http\Controllers;

use App\Testimonial;
use App\Hotel;
use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        //
        // return $request;
        $testi = new Testimonial;
        $testi->testi_id = $request->input('id');
        $testi->testi_type = $request->input('testi_type');
        $testi->review=$request->input('testimonial');
        $testi->status='ready';
        $testi->user_id = Auth::user()->id;
        $testi->user_name = Auth::user()->name;

        $testi->save();
        // return $testi;

        if ($testi->testi_type=='hotel') {
            $hotel = Hotel::where('id', $testi->testi_id)->first();

            return redirect()->route('hotels.show', ['hotel'=>$hotel->id]);
    
        } elseif($testi->testi_type=='site') {
            $hotel = Site::where('id', $testi->testi_id)->first();

            return redirect()->route('sites.show', ['hotel'=>$hotel->id]);
    
        }
        
   
    }

 
    public function review( Request $request){
        //
        // return $request;
        $testi = new Testimonial;
        $testi->testi_id = $request->input('id');
        $testi->testi_type = $request->input('testi_type');
        $testi->review=$request->input('testimonial');
        $testi->status='ready';
        $testi->user_id = Auth::user()->id;
        $testi->user_name = $request->input('name');

        // return $testi;
        $testi->save();
        // return $testi;
        return redirect()->route('home');
        
    }

    public function unpublish(Request $request){
        //
        // return $request;
        $id = $request->input('id');
        // return $id;

        $review = Testimonial::where('id', $id)->first();

        $review->status ='Blocked';

        $review->save();

        return redirect()->route('home');
        // return $review;
    }


    public function publish(Request $request){
        //
        // return $request;
        $id = $request->input('id');
        // return $id;

        $review = Testimonial::where('id', $id)->first();

        $review->status ='ready';

        $review->save();

        return redirect()->route('home');
        // return $review;
    }
}
