<?php

namespace App\Http\Controllers;

use App\Site;
use App\Siterate;
use App\Hotel;
use App\Image;
use App\Contact;

use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SitesController extends Controller
{
    public function __construct() { 
        $this->middleware('auth',['except' => ['show','index']]); 
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $hotels = Hotel::where('status', 'ready')->get();

        $sites = Site::where('status', 'ready')
            ->get();
        return view('sites.index')
            ->with('hotels', $hotels)
            ->with('attractions', $sites);
            
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $hotels = Hotel::where('status', 'ready')->get();

        $site = Site::where('status', 'ready')
            ->where('user_id', Auth::user()->id)
            ->first();

        return view('sites.create')
            ->with('site', $site)
            ->with('hotels', $hotels);
        
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
        //return Auth::user()->id;;
        //file upload

        if($request->hasFile('cover_1')){
            //get filename adn extension
            $filenamewithext=$request-> 	file('cover_1')->	
            getClientOriginalName();
            //get just filename
            $filename=pathinfo($filenamewithext, 	PATHINFO_FILENAME);
            //get just extension
            $extension=$request->	file('cover_1')->	getClientOriginalExtension();
            //set filename
            $fileNameToStore1=	$filename.'_cover_1_'.time().'.'.$extension;
            //upload image
            $path=$request->file('cover_1')->storeAs('public/uploads/sites/covers',$fileNameToStore1);
        }
        else{
            $fileNameToStore1 = 'slider.jpg';
        }

        //return $fileNameToStore1;
        if($request->hasFile('cover_2')){
            //get filename adn extension
            $filenamewithext=$request-> 	file('cover_2')->	
            getClientOriginalName();
            //get just filename
            $filename=pathinfo($filenamewithext, 	PATHINFO_FILENAME);
            //get just extension
            $extension=$request->	file('cover_2')->	getClientOriginalExtension();
            //set filename
            $fileNameToStore2=	$filename.'_cover_2_'.time().'.'.$extension;
            //upload image
            $path=$request->file('cover_2')->storeAs('public/uploads/sites/covers',$fileNameToStore2);
        }
        else{
            $fileNameToStore2 = 'slider.jpg';
        }

        //return $fileNameToStore2;

        if($request->hasFile('cover_3')){
            //get filename adn extension
            $filenamewithext=$request-> 	file('cover_3')->	
            getClientOriginalName();
            //get just filename
            $filename=pathinfo($filenamewithext, 	PATHINFO_FILENAME);
            //get just extension
            $extension=$request->	file('cover_3')->	getClientOriginalExtension();
            //set filename
            $fileNameToStore3=	$filename.'_cover_3_'.time().'.'.$extension;
            //upload image
            $path=$request->file('cover_3')->storeAs('public/uploads/sites/covers',$fileNameToStore3);
        }
        else{
            $fileNameToStore3 = 'slider.jpg';
        }

        //return $fileNameToStore3;

        if($request->hasFile('overview_image')){
            //get filename adn extension
            $filenamewithext=$request-> 	file('overview_image')->	
            getClientOriginalName();
            //get just filename
            $filename=pathinfo($filenamewithext, 	PATHINFO_FILENAME);
            //get just extension
            $extension=$request->	file('overview_image')->	getClientOriginalExtension();
            //set filename
            $overview_image=	$filename.'_overview_'.time().'.'.$extension;
            //upload image
            $path=$request->file('overview_image')->storeAs('public/uploads/sites/about',$overview_image);
        }
        else{
            $overview_image = 'slider.jpg';
        }

        //return $overview_image;
        $site = new Site;

        $site->name=$request->input('name');
        $site->user_id=Auth::user()->id;
        $site->type=$request->input('type');
        $site->slider_text=$request->input('slider_text');
        $site->overview=$request->input('overview');
        $site->route=$request->input('route');
        $site->address=$request->input('address');
        $site->state=$request->input('state');
        $site->slag=$request->input('slag');
        $site->counrty=$request->input('country');
        $site->email=$request->input('email');
        $site->phone=$request->input('phone');
        $site->twitter=$request->input('twitter');
        $site->facebook=$request->input('facebook');
        $site->google_plus=$request->input('google_plus');
        $site->about=$request->input('about');
        $site->overview_image=$overview_image;
        $site->cover_1=$fileNameToStore1;
        $site->cover_2=$fileNameToStore2;
        $site->cover_3=$fileNameToStore3;

        $site->save();
        
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        //
        $hotels = Hotel::where('status', 'ready')->get();

        $site_hotels = Hotel::where('site_id', $site->id)->paginate(5);

        // return $site_hotels;

        $site_img = Image::where('img_type', 'site')
            ->where('type_id', $site->id)
            ->get();
            // return $site_img;

        $rates = Siterate::where('site_id', $site->id)->first();

        $testi = Testimonial::where('testi_type', 'site')
            ->where('testi_id', $site->id)
            ->where('status', 'ready')
            ->take(3)
            ->orderBy('id', 'desc')
            ->get();

        $sites = Site::where('status', 'ready')
            ->get();
        #return $rates;
        return view('sites.show')
            ->with('testimonials', $testi)
            ->with('attractions', $sites)
            ->with('site_hotels', $site_hotels)
            ->with('rates', $rates)
            ->with('images', $site_img)
            ->with('hotels', $hotels)
            ->with('site', $site);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        //
    }

    public function images($id=null){
        //
        // return $id;
        if (Auth::user()->role=='site_manager') {
            /**
             * the user is redirected to upload images for the sites
             * 
             * this is if he is a site manager
             */

            $site=Site::where('user_id', Auth::user()->id)->where('id', $id)->first();
            // return $site;
            if (!$site) {

                return view('pages.not_found');

            }else {
                $images=Image::where('type_id', $site->id)->get();
                return view('sites.image')->with('images', $images)->with('site',$site);
            }
        }else {
            return view('pages.not_found');

        }

    }

    public function img_store(Request $request)
    {
        //
        // return $request;
        
        $this->validate($request,[
            'image'=>'image|max:2000'
        ]);
        // return $request;
        

        if($request->hasFile('image')){
            //get filename adn extension
            $filenamewithext=$request-> 	file('image')->	
            getClientOriginalName();
            //get just filename
            $filename=pathinfo($filenamewithext, 	PATHINFO_FILENAME);
            //get just extension
            $extension=$request->	file('image')->	getClientOriginalExtension();
            //set filename
            $image=	$filename.'_image_'.Auth::user()->name.time().'.'.$extension;
            //upload image
            $path=$request->file('image')->storeAs('public/uploads/sites/images',$image);
        }
        else{
            $image = 'image.jpg';
        }

        $img = new Image;
        $img->url = $image;
        $img->field=$request->input('field');
        $img->activity=$request->input('activity');
        $img->description=$request->input('description');
        $img->type_id=$request->input('site_id');
        $img->img_type='site';

        $img->save();
        $site_img = Image::where('img_type', $img->img_type)
            ->where('type_id', $img->type_id)
            ->get();
        
        if (count($site_img)>2) {

            $site=Site::where('user_id', Auth::user()->id)
                ->where('id', $img->type_id)
                ->first();
            $site->status = 'ready';
            $site->save();
                return redirect()->route('sites.show', ['site'=>$site->id, 'images'=>$site_img]);
                    
        }else {

            
            $site=Site::where('user_id', Auth::user()->id)
                ->where('id', $img->type_id)
                ->first();
            return redirect()->route('images.site',['id'=>$img->type_id]);
            

        }
        return back();
    }

    public function contact(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'subject'=>'required',
            'email'=>'required',
            'message'=>'required',
            'type'=>'required',
            'user_id'=>'required'
        ]);
        // return $request;

        $message = new Contact;
        $message->name=$request->input('name');
        $message->subject=$request->input('subject');
        $message->email=$request->input('email');
        $message->message=$request->input('message');
        $message->s_id=1;
        $message->r_id = $request->input('user_id');
        $message->type='site';
        $message->type_id=$request->input('type');
            // return $message;
        $message->save();

        return redirect()->route('pages.contact')->with('success','Message Sent Successfully');
    }

    /**
     * this method is used to create site rates
     */
    public function create_rates($id=null)
    {
        //
        // return $id;
         //
        //return $request;
        $site = Site::where('user_id',Auth::user()->id)
            ->where('id', $id)
            ->first();
    
        if (!$site) {
            
            return redirect()->route('sites.create');
        }
        
        return view('sites.create_rates')->with('site', $site);
    }

    public function rates(Request $request)
    {
        //
          //
        //   return $request;

          $site_rate=Siterate::where('site_id', $request->input('site_id'))->first();
          // return $site_rate;
          if (!$site_rate) {
              $rate = new Siterate;
              $rate->site_id = $request->input('site_id');
              $rate->resident_child=$request->input('resident_child');
              $rate->resident_adult=$request->input('resident_adult');
              $rate->citizen_child=$request->input('citizen_child');
              $rate->citizen_adult=$request->input('citizen_adult');
              $rate->non_resident_child=$request->input('non_resident_child');
              $rate->non_resident_adult=$request->input('non_resident_adult');
              $rate->save();
              $site=Site::where('id', $rate->site_id)->first();
              $site->status='images';
              $site->save();
              // return $site;
              return redirect()->route('home');
          }else {
            return redirect()->route('home');
        }
           
    }


   
}
