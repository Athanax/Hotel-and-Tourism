<?php

namespace App\Http\Controllers;

use App\Siterate;
use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;

class SiteratesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sites = Site::where('status', 'ready')
            ->get();
        return view('siterates.index')
            ->with('sites', $sites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return $request;
        $site = Site::where('user_id',Auth::user()->id)->first();
    
        if (!$site) {
            
            return redirect()->route('sites.create');
        }
        
        return view('siterates.create')->with('site', $site->id);
        
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
            return redirect()->route('images.site', ['id', $site->id])->with('success', 'You have successfully created the siterates!');
        }else {
            return redirect()->route('images.site',['id'=>$site_rate->site_id]);
        }
         
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siterate  $siterate
     * @return \Illuminate\Http\Response
     */
    public function show(Siterate $siterate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siterate  $siterate
     * @return \Illuminate\Http\Response
     */
    public function edit(Siterate $siterate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siterate  $siterate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siterate $siterate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siterate  $siterate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siterate $siterate)
    {
        //
    }
}
