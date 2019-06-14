<?php

namespace App\Http\Controllers;

use App\Site;
use App\Hotel;
use App\Notice;
use App\Contact;
use Illuminate\Http\Request;

class PagesController extends Controller
{
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
        return view('pages.index')
            ->with('hotels', $hotels)
            ->with('attractions', $sites);
    }

    public function about()
    {
        //
        $hotels = Hotel::where('status', 'ready')->get();

        $sites = Site::where('status', 'ready')
            ->get();
        return view('pages.about')
            ->with('hotels', $hotels)

            ->with('attractions', $sites);
    }

    public function contact()
    {
        //
        $hotels = Hotel::where('status', 'ready')->get();

        $sites = Site::where('status', 'ready')
            ->get();
        return view('pages.contact')
            ->with('hotels', $hotels)

            ->with('attractions', $sites);
    }

    public function news()
    {
        //
        $hotels = Hotel::where('status', 'ready')->get();

        $sites = Site::where('status', 'ready')
            ->get();

        $news = Notice::where('status','ready')
            ->orderBy('id', 'desc')
            ->paginate('5');

            // return $news;
        return view('pages.news')
            ->with('news', $news)
            ->with('hotels', $hotels)
            ->with('attractions', $sites);
    }

    public function portfolio()
    {
        //
        $hotels = Hotel::where('status', 'ready')->get();

        $sites = Site::where('status', 'ready')
            ->get();
        return view('pages.portfolio')
            ->with('hotels', $hotels)
            ->with('attractions', $sites);
    }

    public function not_found()
    {
        //

        return redirect()->route('pages.not_found');
    }

    public function message(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ]);
        // return $request;

        $message = new Contact;
        $message->name=$request->input('name');
        $message->subject=$request->input('subject');
        $message->email=$request->input('email');
        $message->message=$request->input('message');
        $message->r_id=1;
        $message->type_id=1;

        // return $message;

        $message->save();

        return redirect()->route('pages.contact')->with('success', 'Message sent Successfully');
    }

   
}
