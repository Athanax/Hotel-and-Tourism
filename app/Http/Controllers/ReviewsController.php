<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use App\Result;
use Illuminate\Http\Response;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('review.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('review.create');
    }

    public function start()
    {
        //
        $questions=Review::all();
        //return $questions;
        return view('review.start')->with('questions',$questions);
    }

    public function see_result(Request $request)
    {
        //
        $questions=Review::all();
        $questions=Review::all();
      $loo=1;

      $MyObjects = array();
      
      
     
      
        foreach($questions as $question){
            
            if($request->$loo == null){
                $request->$loo=null;
            }
          
            $Myobj = [
                'question' => $question->question,
                'correct' => $question->answer,
                'answer'=> $request->$loo,
            ];

            array_push($MyObjects,$Myobj);
            
            $loo++;
        }
        // return $MyObjects;
        return view('review.result')->with('results',$MyObjects);
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
        $available = Review::orderBy('q_number', 'asc')->get();
        $num = count($available);
        // return $num;
        if ($num<=10) {
            $a=1;
            while ($a <= 10) {
                $quiz=Review::where('q_number', $a)->first();
                //return $quiz;
                if (empty($quiz)) {
                    //return $request;

                   $review =new Review;
                   $review->question=$request->Question;
                   $review->first=$request->first;
                   $review->second=$request->second;
                   $review->third=$request->third;
                   $review->fourth=$request->fourth;
                   $correct=$request->correct;
                   $review->answer=$request->$correct;
                   $review->q_number=$a;
                   $review->save();
                   return redirect()->route('review.create');
                }
                
                //return $a;
                $a++;
            }
           return $num;
        }
        return view('review.index')->with('success', 'Could not create more questions, MAX is ten');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
