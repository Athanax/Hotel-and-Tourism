@extends('layouts.app')

@section('content')
    @foreach ($results as $result)
    <p>{{ $result['question'] }}</p>
    @if ($result['answer']==NULL)
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading"></h4>
            <p>You did not answer this question</p>
            <p class="mb-0">The correct answer is <strong> "{{ $result['correct'] }}"</strong></p>
        </div>
    @else 
    @if ( $result['answer']== $result['correct'])
        <div class="alert alert-success" role="alert">
            <strong>this answer was correct</strong>
        </div>
        
    @else
    <div class="alert alert-danger" role="alert">
        <strong>"{{ $result['answer'] }}" was wrong. The correct answer is "{{ $result['correct'] }}"</strong>
    </div>

    @endif
    @endif
    
     
         
    @endforeach
@endsection