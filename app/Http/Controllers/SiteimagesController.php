<?php

namespace App\Http\Controllers;

use App\Siteimage;
use App\Site;
use App\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteimagesController extends Controller
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
    public function create()
    {
        //
        $site=Site::where('id', Auth::user()->id)->first();
        
        if (!$site) {
            return view('home');
        }else {
            $images=Siteimage::where('site_id', $site->id)->get();
            return view('siteimages.create')->with('images', $images)->with('site',$site);
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
        
        $this->validate($request, [
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
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
        
        $site = Site::where('id', $gal->site_id)->first();
        //return $site;
        $site->status='ready';
        $site->save();
        #return $site;
        return redirect()->route('sites.show', ['site'=> $site->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siteimage  $siteimage
     * @return \Illuminate\Http\Response
     */
    public function show(Siteimage $siteimage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siteimage  $siteimage
     * @return \Illuminate\Http\Response
     */
    public function edit(Siteimage $siteimage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siteimage  $siteimage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siteimage $siteimage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siteimage  $siteimage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siteimage $siteimage)
    {
        //
    }
}
