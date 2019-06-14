@extends('layouts.app')

@section('content')

    @if (count($questions)>0)
    <h2 id="demo"></h2>
        <form id="myForm" class="" method="post" action="{{ route('see_result') }}">
            {{ csrf_field() }}
            @foreach ($questions as $question)
            <p>{{ $question->question.'?' }}</p>
            <div class="form-group row">
                <label for="email" class="col-md-1 control-label"> </label>
                <div class="col-md-9">
                    <label class="btn btn-primary">
                        <input type="radio" name="{{ $question->q_number }}" value="{{ $question->first }}" id="">
                    </label>
                    <span class="control-label">{{ $question->first }}</span><br>
                    <label class="btn btn-primary">
                        <input type="radio" name="{{ $question->q_number }}" value="{{ $question->second }}" id="">
                    </label>
                    <span class="control-label">{{ $question->second }}</span><br>
                    <label class="btn btn-primary">
                        <input type="radio" name="{{ $question->q_number }}" value="{{ $question->third }}" id="">
                    </label>
                    <span class="control-label">{{ $question->third }}</span><br>
                    <label class="btn btn-primary">
                        <input type="radio" name="{{ $question->q_number }}" value="{{ $question->fourth }}" id="">
                    </label>
                    <span class="control-label">{{ $question->fourth }}</span><br>
                </div>
            </div>
                
            @endforeach
            
            <input type="submit" class="btn btn-success pull-right">
        </form>
      

        <script>
                // Set the date we're counting down to

                //the new date function 'new Date()' captures the date and time now

                // the get time function getTime() converts the date to timestamp

                //the 15000 is the number of milliseconds required for the test

                // 15000 milliseconds is 15 seconds, which i had set according to my test
                
                //the variable countDownDate adds 15 seconds the the current date which the countdown will start from
                var countDownDate = new Date().getTime()+15000;
                
                // Update the count down every 1 second ie. 1000 miliseconds
                var x = setInterval(function() {
                
                  // Get todays date and time at this moment which takes the variable now
                  var now = new Date().getTime();
                    
                  // Find the distance between now and the count down date
                  var distance = countDownDate - now;
                    
                  // Time calculations for days, hours, minutes and seconds
                 
                  // variable minutes takes the number of minutes in the countdown

                  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

                  // variable seconds takes the number of seconds in the countdown

                  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    
                  // Output the result in an element with id="demo"

                  //this statement changes the  number of minutes and seconds on the screen

                  document.getElementById("demo").innerHTML =minutes + "m " + seconds + "s ";
                  console.log(minutes);
                    
                  // If the count down is over, ie. when the distance is less than 1, the form submits the contents automatically. 
                  
                  if (distance < 1) {
                    clearInterval(x);
                    document.getElementById("myForm").submit();
                  }
                }, 1000);
               
                </script>
                {{-- <script>
                    $(document).ready(function(){
                        //alert();
                        // $(document).keydown(function(e){
                        //     return (e.which || e.keycode) !=116;
                        // });
                        // window.onbeforeunload = function () {
                        //     return false;
                        // }
                        $(document).onkeydown(function(event){
                            return event.keycode=154;
                        })
                        // onkeydown="return (event.keyCode == 154)"
                    });
                </script> --}}
                {{-- <script language="javascript"type="text/javascript">
                $(document).ready(function(){
                    //this code handles the F5/Ctrl+F5/Ctrl+R
                    //alert();
                    document.onkeydown = checkKeycode
                    
                    function checkKeycode(e){
                        var keycode;
                        if(window.event)
                    
                        keycode = window.event.keyCode;
                        else if(e)
                    
                        keycode = e.which;
                        //Mozilla firefox
                        if($.browser.mozilla){
                            if(keycode ==116||(e.ctrlKey && keycode ==82)){
                                if(e.preventDefault){
                    
                            e.preventDefault();
                    
                            e.stopPropagation();
                        }
                        }
                        }
                        else if($.browser.msie){
                            if(keycode ==116||(window.event.ctrlKey && keycode ==82)){
                    
                        window.event.returnValue =false;
                    
                        window.event.keyCode =0;
                    
                        window.status ="Refresh is disabled";
                        }
                     }
                    }
                    });
                
                </script> --}}
                    
                    
        
    @endif
@endsection