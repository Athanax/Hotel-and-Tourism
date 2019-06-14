<?php


namespace App\Http\Controllers;
use App\User;
use App\Notice;
use App\Hotel;
use App\Site;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminsController extends Controller
{
    //
    public function assign(Request $request)
    {
        //
        if (Auth::user()->role=='admin') {
        $id = $request->input('user');
        $role = $request->input('role');

        $user = User::where('id', $id)->first();

        $user->role=$role;
        // return $user;
        $user->save();

        return redirect()->route('home');
            
        }
    }

    public function news()
    {
        //
        if (Auth::user()->role='admin') {
            $site = Site::where('user_id', Auth::user()->id)
                ->first();
        
        
            $hotel = Hotel::where('user_id', Auth::user()->id)
                ->first();

            $news=Notice::where('notice_type', 'home')
                ->orderBy('id', 'desc')
                ->get();
            // return $news;

            return view('dashboards.news')
                ->with('site', $site)
                ->with('hotel', $hotel)
                ->with('news', $news);
        }else{
            return back();
        }
        
    }
    public function store_news(Request $request)
    {
        //
        // return $request;
        $this->validate($request,[
            'image'=>'image|max:1999'
           
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
            $img_name=	$filename.'-news-'.time().'.'.$extension;
            //upload image
            $path=$request->file('image')->storeAs('public/uploads/news',$img_name);
        }
        else{
            $img_name = 'news.jpg';
        }

        // return $request;
        $news = new Notice;
        $news->notice_type=$request->input('new_type');
        $news->type_id=$request->input('type_id');
        $news->head=$request->input('head');
        $news->image=$img_name;
        $news->body=$request->input('body');

        $news->save();

        return redirect()->route('home.news');

        
    }
    public function publish(Request $request)
    {
        //
        // return $request;
        $id = $request->input('id');
        $status = $request->input('task');
        // return $status;

        $news = Notice::where('id', $id)->first();
        $news->status=$status;

        $news->save();

        return redirect()->route('home.news');
    }
}
