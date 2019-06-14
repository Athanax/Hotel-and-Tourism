<?php

namespace App\Http\Controllers;
use App\Booksite;
use App\Bookhotel;



use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    //
    public function index()
    {
        //
        $site_record = Booksite::all();
        // return $site_record;

        $hotel_record = Bookhotel::all();

        return view('dashboards.report')
            ->with('hotel_record', $hotel_record)
            ->with('site_record', $site_record);
    }

    
}
