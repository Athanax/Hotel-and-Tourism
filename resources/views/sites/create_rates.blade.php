@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h3 class="text-center">Payment rates</h3>
        <p class="text-center"><small>(Fill the rates of your attraction site in US dollars paer individual. )</small></p>
        <form action="{{ route('sites.rates') }}" method="POST">

            {{csrf_field()}}
            <fieldset >
                <legend>Resident</legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Child</label>
                            <input required class="form-control" min="0" type="number" name="resident_child" id="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Adult</label>
                            <input required class="form-control" min="0" type="number" name="resident_adult" id="">
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset >
                <legend>Citizens</legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Child</label>
                            <input required class="form-control" min="0" type="number" name="citizen_child" id="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Adult</label>
                            <input required class="form-control" min="0" type="number" name="citizen_adult" id="">
                        </div>
                    </div>
                </div> 
            </fieldset>
            <fieldset >
                <legend>Non-Resident</legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Child</label>
                            <input required class="form-control" min="0" type="number" name="non_resident_child" id="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Adult</label>
                            <input required class="form-control" min="0" type="number" name="non_resident_adult" id="">
                        </div>
                    </div>
                </div>
            </fieldset>
        <input class="form-control" name="site_id" type="hidden" value="{{ $site->id }}">
        <input type="submit" class="btn btn-primary pull-right">
        </form>
    </div>
    <div class="col-md-4">

    </div>
</div>


    
@endsection