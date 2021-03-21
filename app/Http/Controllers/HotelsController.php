<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\User;
use App\Site;
use App\Image;
use App\Room;
use App\Bookhotel;
use App\Testimonial;
use App\Contact;
use App\Notice;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelsController extends Controller
{
    public function __construct() {
        $this->middleware('auth',
            ['except' => ['show','index']]
        );
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
        return view('hotels.index')
            ->with('hotels', $hotels)
            ->with('attractions', $sites);

    }

    public function images($id =null)
    {
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
            // return $hotel;
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
    public function img_store(Request $request)
    {
        //

        $this->validate($request,[
            // 'image'=>'image|max:2000'
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
            $path=$request->file('image')->storeAs('public/uploads/hotels/images',$image);
        }
        else{
            $image = 'image.jpg';
        }

        $img = new Image;
        $img->url = $image;
        $img->field=$request->input('field');
        $img->activity=$request->input('activity');
        $img->description=$request->input('description');
        $img->type_id=$request->input('hotel_id');
        $img->img_type='hotel';

        $img->save();
        $hotel_img = Image::where('img_type', $img->img_type)
            ->where('type_id', $img->type_id)
            ->get();

        if (count($hotel_img)>3) {

            $hotel=Hotel::where('user_id', Auth::user()->id)
                ->where('id', $img->type_id)
                ->first();
            $hotel->status = 'rooms';
            $hotel->save();
                return redirect()->route('hotels.show', ['hotel'=>$hotel->id, 'images'=>$hotel_img]);

        }else {


            $hotel=Hotel::where('user_id', Auth::user()->id)
                ->where('id', $img->type_id)
                ->first();
            return redirect()->route('images.hotel',['id'=>$img->type_id]);
            // return redirect()->route('hotels.image')

            //      ->with('hotel', $hotel);

        }
        return back();
    }

    public function room(Request $request)
    {
        //
        // return 23;
        if ($request) {
            $hotel_id = $request->id;
            // return $hotel_id;
            $hotel = Hotel::where('id', $hotel_id)
                ->where('user_id', Auth::user()->id)
                ->first();
                // return $hotel;
            return view('hotels.room')
                ->with('hotel', $hotel);
        }else {
            return back();
        }

    }

    public function store_room(Request $request)
    {
        //

        $this->validate($request,[
            // 'image'=>'image|max:1999'
        ]);

        if($request->hasFile('image')){
            //get filename adn extension
            $filenamewithext=$request-> 	file('image')->
            getClientOriginalName();
            //get just filename
            $filename=pathinfo($filenamewithext, 	PATHINFO_FILENAME);
            //get just extension
            $extension=$request->	file('image')->	getClientOriginalExtension();
            //set filename
            $image=	$filename.'_room_'.Auth::user()->name.time().'.'.$extension;
            //upload image
            $path=$request->file('image')->storeAs('public/uploads/hotels/rooms',$image);
        }
        else{
            $image = 'room.jpg';
        }

        $room = new Room;
        $room->no_of_rooms=$request->input('no_of_rooms');
        $room->size_type = $request->input('name');
        $room->size = $request->input('size');
        // $room->capacity=$request->input('capacity');
        $room->desciption=$request->input('description');
        $room->room_no=$request->input('room_no');
        $room->image=$image;
        $room->beds=$request->input('beds');
        $room->hotel_id = $request->input('id');
        $room->cost=$request->input('cost');

        $room->save();



        $hotel = Hotel::where('id', $room->hotel_id)
            ->where('user_id', Auth::user()->id)
            ->first();
            $hotel->status='ready';
            $hotel->save();

        return redirect()->route('hotels.show', ['hotel'=>$hotel]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        //
        $sites=Site::where('status', 'ready')->get();

        // return $sites;
        if (Auth::user()) {
            return view('hotels.create')
                ->with('sites', $sites);
        }else{
            return back();
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
            $path=$request->file('cover_1')->storeAs('public/uploads/hotels/covers',$fileNameToStore1);
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
            $path=$request->file('cover_2')->storeAs('public/uploads/hotels/covers',$fileNameToStore2);
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
            $path=$request->file('cover_3')->storeAs('public/uploads/hotels/covers',$fileNameToStore3);
        }
        else{
            $fileNameToStore3 = 'slider.jpg';
        }

        if($request->hasFile('about_image')){
            //get filename adn extension
            $filenamewithext=$request-> 	file('about_image')->
            getClientOriginalName();
            //get just filename
            $filename=pathinfo($filenamewithext, 	PATHINFO_FILENAME);
            //get just extension
            $extension=$request->	file('about_image')->	getClientOriginalExtension();
            //set filename
            $about_image=	$filename.'_about_'.time().'.'.$extension;
            //upload image
            $path=$request->file('about_image')->storeAs('public/uploads/hotels/about',$about_image);
        }
        else{
            $about_image = 'slider.jpg';
        }
        // return $request;

        $hotel = new Hotel;
        $hotel->name=$request->input('name');
        $hotel->type=$request->input('type');
        $hotel->user_id = Auth::user()->id;
        $hotel->email=$request->input('email');
        $hotel->country=$request->input('country');
        $hotel->address=$request->input('address');
        $hotel->state=$request->input('state');
        // $hotel->site_id=$request->input('site');
        $hotel->site_id = 1;
        $hotel->cover_text=$request->input('slider_text');
        $hotel->phone_1=$request->input('phone_1');
        $hotel->phone_2=$request->input('phone_2');
        $hotel->about=$request->input('about');
        $hotel->stars=$request->input('rating');
        $hotel->cover_1 = $fileNameToStore1;
        $hotel->cover_2 =  $fileNameToStore2;
        $hotel->cover_3 =  $fileNameToStore3;
        $hotel->about_image = $about_image;

        $hotel->save();
//   return $hotel;
        return redirect()->route('home', ['hotel'=> $hotel]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
        $rooms = Room::where('hotel_id', $hotel->id)
            ->get();

        $hotel_img = Image::where('img_type', 'hotel')
            ->where('type_id', $hotel->id)
            ->get();

        $testi = Testimonial::where('testi_type', 'hotel')
            ->where('status', 'ready')
            ->where('testi_id', $hotel->id)
            ->take(3)
            ->orderBy('id', 'desc')
            ->get();


        return view('hotels.show')
            ->with('rooms', $rooms)
            ->with('testimonials', $testi)
            ->with('images', $hotel_img)
            ->with('hotel', $hotel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        //
    }

    public function about($id = null)
    {
        if ($id) {
            $hotel = Hotel::where('id', $id)->first();

            if ($hotel) {
                return view('hotels.about')
                ->with('hotel', $hotel);
            }
            return view('pages.not_found');

        }else {
            return back();
        }


    }


    public function contact(Hotel $hotel, $id = null)
    {
        if ($id) {
            $hotel = Hotel::where('id', $id)->first();

            if ($hotel) {
                return view('hotels.contact')
                ->with('hotel', $hotel);
            }
            return view('pages.not_found');

        }else {
            return back();
        }


    }


    public function news($id = null)
    {
        if ($id) {
            $hotel = Hotel::where('id', $id)->first();

            $news = Notice::where('status', 'ready')->get();



            if ($hotel) {
                return view('hotels.news')
                ->with('news', $news)
                ->with('hotel', $hotel);
            }
            return view('pages.not_found');

        }else {
            return back();
        }


    }

    public function check(Request $request, $id=null){
        //
        //  return $request;
        /**
         * one day = 86,400 seconds
         * 1/2 day = 43,200 seconds
         *
         */
        list($start, $stop)=explode('-', $request->input('checkin'));

// start my query

$today= $start;
$tomorrow=$stop;

$tomorrow=ltrim($tomorrow, ' ');






$reservations=Bookhotel::where('hotel_id',$request->hotel_id)->where(function($query) use($today){
    //lower comparison
    $query->where('check_in','<=',$today)
          ->where('check_out','>',$today);

})->orWhere(function($query) use($tomorrow){
    //higher comparison
    $query->where('check_in','<=',$tomorrow)
          ->where('check_out','>',$tomorrow);

})
->orWhere(function($query) use($tomorrow,$today){
    //higher comparison
    $query->where('check_in','>',$today)
          ->where('check_out','<',$tomorrow);

})->get();

// return $reservations;

$rooms=Room::all();

//$reservations are all available rooms in all hotels in a certain date

//$rooms are all rooms in the whole system

//this loop removes the rooms which appear twice in the reservations array

//
foreach($reservations as $reservation){
    foreach($rooms as $room){

       if ($room->id == $reservation->room_id) {
           $a=$room->id;


         //it creates a new array called rooms which in which every room appear
           $rooms=$rooms->filter(function($value,$key) use($a){
               return $value->id != $a;


           });

       }

    }

}



//end my query




        $chk = [
            'date'=>$request->input('checkin'),
            'checkin'=>$start,
            'checkout'=>$stop,
            'rooms'=>$request->input('rooms')
        ];

        $hotel = Hotel::where('id', $id)->first();
        // return $hotel;
        return view('hotels.check')
            ->with('check', $chk)
            ->with('rooms', $rooms)
            ->with('hotel', $hotel);

    }

    public function pay(Request $request){
        //
        /**
         * submission when the room is ready for payment
         */

        list($start, $stop)=explode('-', $request->input('dates'));

        $checkin = strtotime($start)+43200;


        $checkout = strtotime($stop)+43200;

        if ($checkin==$checkout) {
            $checkout=$checkin+86400;
        }

        // return date('Y/m/d - H:i:s',$checkin) .'    '. date('Y/m/d - H:i:s',$checkout);
        $days = ($checkout-$checkin)/86400;
        // return $days;
        $room = Room::where('id', $request->input('room_id'))->first();
        // return $room;
        $hotel = Hotel::where('id', $request->input('hotel_id'))->first();
        //return $hotel;
        $chk = [
            'cost'=>$days*$room->cost,
            'days'=>$days,
            'dates'=>$request->input('dates'),
            'hotel_id'=>$request->input('hotel_id'),
            'room_id'=>$request->input('room_id'),
            'room_no'=>$request->input('room_no'),
            'checkin'=>date('D d M, Y',$checkin),
            'checkout'=>date('D d M, Y',$checkout)

        ];

        return view('hotels.pay')
            ->with('check', $chk)
            ->with('hotel', $hotel)
            ->with('room', $room);


    }

    public function book(Request $request){
        //
        // return $request;
        list($start, $stop)=explode('-', $request->input('dates'));

        $checkin = strtotime($start)+43200;


        $checkout = strtotime($stop)+43200;

        if ($checkin==$checkout) {
            $checkout=$checkin+86400;
        }
        $days = ($checkout-$checkin)/86400;
        // return $days;
        $room = Room::where('id', $request->input('room_id'))->first();
        // return $room;
        $hotel = Hotel::where('id', $request->input('hotel_id'))->first();
        //return $hotel;
        $chk = [
            'cost'=>$days*$room->cost,
            'days'=>$days,
            'dates'=>$request->input('dates'),
            'hotel_id'=>$request->input('hotel_id'),
            'room_id'=>$request->input('room_id'),
            'room_no'=>$request->input('room_no'),
            'checkin'=>date('D d M, Y',$checkin),
            'checkout'=>date('D d M, Y',$checkout),


        ];

        $expiry=$request->input('expiry_date');
        if (strtotime($expiry)<time()) {
          return $expiry;
        }

        $booking = new Bookhotel;
        $booking->hotel_id = $request->input('hotel_id');
        $booking->user_id=Auth::user()->id;
        $booking->name=Auth::user()->name;
        $booking->no_of_rooms=$room->no_of_rooms;
        $booking->country=Auth::user()->country;
        $booking->email=Auth::user()->email;
        $booking->address=Auth::user()->address;
        $booking->phone=Auth::user()->phone;
        $booking->room_id=$room->id;
        $booking->room_no=$room->room_no;
        $booking->check_in=date('m/d/Y',$checkin);
        $booking->check_out=date('m/d/Y',$checkout);
        $booking->amount=$days*$room->cost;

        $booking->save();

        // $room = Room::where('id', $booking->room_id)->first();
        // $room->status = 'booked';
        // $room->save();

        return redirect()->route('home');
        //return $booking;


    }

    public function message(Request $request)
    {
        //
        // return $request;
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

        return back()->with('success','Message Sent Successfully');
    }

}
