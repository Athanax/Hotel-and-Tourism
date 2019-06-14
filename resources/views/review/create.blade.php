@extends('layouts.app')

@section('content')
    <form class="container-fluid" action="{{ route('review.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="email" class="col-md-2 control-label">Question</label>
            <div class="col-md-9">
                <textarea required class="form-control" placeholder="Type your question here..." name="Question" id="" cols="20" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-2 control-label">First Answer</label>
            <div class="col-md-9">
                <textarea required class="form-control" placeholder="Type your question here..." name="first" id="" cols="20" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-2 control-label">Second Answer</label>
            <div class="col-md-9">
                <textarea required class="form-control" placeholder="Type your question here..." name="second" id="" cols="20" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-2 control-label">Third Answer</label>
            <div class="col-md-9">
                <textarea required class="form-control" placeholder="Type your question here..." name="third" id="" cols="20" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-2 control-label">Forth Answer</label>
            <div class="col-md-9">
                <textarea required class="form-control" placeholder="Type your question here..." name="fourth" id="" cols="20" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-2 control-label">Correct Answer</label>
            <div class="col-md-9">
                <select class="form-control" required name="correct" id="">
                    <option value="" selected disabled>An answer MUST be selected</option>
                    <option value="first">First</option>
                    <option value="second">Second</option>
                    <option value="third">Third</option>
                    <option value="fourth">Fourth</option>
                </select>
            </div>
        </div>
        <div class="container-fluid">
        <input type="submit" class="btn btn-primary pull-left">
            
        </div>
            
    </form>
@endsection