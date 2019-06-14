<?php

namespace App\Http\Controllers;

use App\Image;
use App\Site;
use App\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImagesController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Hotel $hotel)
    {
        //
               
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
        if($request->hasFile('images')){
            foreach ($request->file('images') as $image) {
                 //get filename adn extension
                $filenamewithext=$image->getClientOriginalName();	
                //get just filename
                $filename=pathinfo($filenamewithext, 	PATHINFO_FILENAME);
                //get just extension
                $extension=$image->getClientOriginalExtension();
                //set filename
                $site_image=	$filename.'_site_'.time().'.'.$extension;
                //upload image
                $path=$image->storeAs('public/images/sites',$site_image);

                //$image_array[]=$site_image;

                $gal = new Image;
                $gal->type_id=$request->input('site_id');
                $gal->img_type='site';
                $gal->description='description';
                $gal->activity='activity';
                $gal->field='field';
                $gal->url=$site_image;
                $gal->save();

                
            }
            
        }
        
        $site = Site::where('id', $gal->type_id)->first();
        // return $site;
        $site->status='ready';
        $site->save();
        #return $site;
        return redirect()->route('sites.show', ['site'=> $site->id]);
    }
  

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }

    public function hotel( $id=null ){
        //
        // return $id;
        if (Auth::user()->role=='hotel_manager') {
            /**
             * the user is redirected to upload images for the hotels
             * 
             * this is if the user is an hotel manager
             */
            
            $hotel = Hotel::where('id', $id)->where('user_id', Auth::user()->id)
            ->first();
            //return $hotel;
            if ($hotel) {
                return view('hotels.image')
                ->with('hotel', $hotel);
            }
            return view('pages.not_found');
            
            // return 'hotel_manager';
        }else {
            return view('pages.not_found');
            
        }
    }

    public function site( $id=null ){
        //
        // return $id;

        if (Auth::user()->role=='site_manager') {
            /**
             * the user is redirected to upload images for the sites
             * 
             * this is if he is a site manager
             */

            $site=Site::where('user_id', Auth::user()->id)->where('id', $id)->first();
            //return $site;
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
}
