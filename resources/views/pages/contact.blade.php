@extends('inc.index')

@section('content')

    <section class="main__middle__container">

        <section class="contact-us">
          <div class="container">
            <div class="row">
              <div class="col-md-8">
                <h3>Send us a message</h3>
                <hr>
                <p>Our friendly customer service representatives are committed to answering all your questions and meeting any need you may have. We would love to hear from you! Please fill out the form below so we may assist you.</p>
                <br/>
                <p id="feedback"></p>
                @include('inc.message')
              <form role="form" id="contact-form" name="contact-form" method="post" action="{{ route('pages.message') }}" class="contact-form">
                {{ csrf_field() }}
                  <div class="form-group col-md-6">
                    <label class="sr-only" for="exampleInputEmail1">Your Name: *</label>
                    <input required type="text" class="form-control" id="name" name="name" placeholder="Your Name: *">
                  </div>
                  <div class="form-group col-md-6">
                    <label class="sr-only" for="exampleInputEmail1">Email: *</label>
                    <input required type="email" class="form-control" id="email" name="email" placeholder="Email: *">
                  </div>
                  <div class="clearfix"></div>
                  <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail1">Subject:</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject:">
                  </div>
                  <div class="form-group">
                    <textarea required class="form-control" id="message" name="message" rows="5" placeholder="Message: *"></textarea>
                  </div>
                  <input id="submit-button" type="submit" class="btn btn-lg btn-info" value="Submit">
                </form>
              </div>
              <div class="col-md-4">
                <h3>Get in touch with us</h3>
                <hr>
                <p>We offer 24 hour support to tourists</p>
                <p>You can contact us through the following numbers and email address</p>
                <p class="black-text"><span class="orange">Address:</span> 4747 - 00100, Nairobi, KENYA</p>
                <p class="black-text"><span class="orange">Telephone:</span> +254702970057</p>
                <p class="black-text"><span class="orange">Phone two:</span>+25479172665</p>
                 </div>
            </div>
          </div>
        </section>
      </section>

    
@endsection