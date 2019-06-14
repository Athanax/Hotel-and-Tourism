@extends('inc.home')

@section('content')

<section class="slider">
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item"> <img data-src="{{ URL::asset('storage/images/slider/slider.jpg') }}" alt="first slide" src="{{ URL::asset('storage/images/slider/slider.jpg') }}">
          <div class="container">
            <div class="carousel-caption text-left">
              <h1 class="">Quisque blandit sed</h1>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.</p>
              <p><a class="btn btn-default btn-lg" href="#" role="button">get started</a><a class="btn btn-default btn-lg" href="#" role="button">read more</a></p>
            </div>
          </div>
        </div>
        <div class="item"> <img data-src="{{ URL::asset('storage/images/slider/slider1.jpg') }}" alt="second slide" src="{{ URL::asset('storage/images/slider/slider1.jpg') }}">
          <div class="container">
            <div class="carousel-caption text-left">
              <h1 class="">Justo rutrum venenatis. Mauris accumsan posuere mauris</h1>
              <p>Sed et orci purus. Vestibulum molestie, dolor sit amet viverra facilisis, justo magna.</p>
              <p><a class="btn btn-default btn-lg" href="#" role="button">get started</a><a class="btn btn-default btn-lg" href="#" role="button">read more</a></p>
            </div>
          </div>
        </div>
        <div class="item active"> <img data-src="{{ URL::asset('storage/images/slider/slider2.jpg') }}" alt="third slide" src="{{ URL::asset('storage/images/slider/slider2.jpg') }}">
          <div class="container">
            <div class="carousel-caption text-left">
              <h1 class="">Vivamus ultrices mattis</h1>
              <p>Consectetur pretium leo. Proin suscipit imperdiet neque, quis lacinia elit cursus nec.</p>
              <p><a class="btn btn-default btn-lg" href="#" role="button">get started</a><a class="btn btn-default btn-lg" href="#" role="button">read more</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon carousel-control-left"></span></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon carousel-control-right"></span></a> </div>
  </section>
  
<!--end of slider section-->
<section class="main__middle__container homepage">
        <div class="row  text-left headings no-margin nothing">
          <div class="container">
            <div class="seper"></div>
            <h1 class="page_title">Donec at mattis lectus, <span>adipiscing pretium</span> ligula.</h1>
            <p>Phasellus laoreet massa id justo mattis pharetra. Fusce suscipit ligula vel quam viverra sit amet mollis tortor congue. Sed quis mauris sit amet magna accumsan tristique.</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">more info</a></p>
          </div>
        </div>
        <div class="titles services text-left">
          <div class="container">
            <div class="seper"></div>
            <h2 class="page__title">Services</h2>
            <p class="small-paragraph">Cras iaculis ultricies nulla.</p>
          </div>
        </div>
        <div class="row three__blocks  text-left no_padding no-margin">
          <div class="container">
            <div class="col-md-4">
              <h3><a href="#">Modern Design</a><span class="small-paragraph">Maecenas fermentum semper</span></h3>
              <img src="{{ URL::asset('storage/images/content__images/img1.jpg') }}" alt="image" class="img-responsive img-rounded">
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. </p>
              <p><a class="btn btn-default btn-md" href="#" role="button">Learn more</a> 
            </div>
            <div class="col-md-4 middle">
              <h3><a href="#">High Quality</a><span class="small-paragraph">Maecenas fermentum semper</span></h3>
              <img src="{{ URL::asset('storage/images/content__images/img2.jpg') }}" alt="image" class="img-responsive img-rounded">
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. </p>
              <p><a class="btn btn-default btn-md" href="#" role="button">Learn more</a> 
            </div>
            <div class="col-md-4">
              <h3><a href="#">Quick Support</a><span class="small-paragraph">Maecenas fermentum semper</span></h3>
              <img src="{{ URL::asset('storage/images/content__images/img3.jpg') }}" alt="image" class="img-responsive img-rounded">
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. </p>
              <p><a class="btn btn-default btn-md" href="#" role="button">Learn more</a> 
            </div>
          </div>
        </div>
        <div class="row no_padding no-margin nothing nice__title text-left">
          <div class="container">
            <div class="seper"></div>
            <h2 class="page__title">Donec fringilla vitae ligula  facilisis. </h2>
            <p>Phasellus laoreet massa id justo mattis pharetra. Fusce suscipit ligula vel quam viverra sit amet mollis tortor congue. Sed quis mauris sit amet magna accumsan tristique.</p>
          </div>
        </div>
        <div class="titles aboutus text-left">
          <div class="container">
            <div class="seper"></div>
            <h2 class="page__title">about us</h2>
            <p class="small-paragraph">Cras iaculis ultricies nulla.</p>
          </div>
        </div>
        <div class="row grey-info-block text-left">
          <div class="container">
            <div class="col-md-6">
              <h3><a href="#">Commodo id natoque malesuada sollicitudin</a></h3>
              <p class="small-paragraph">Cras iaculis ultricies nulla.</p>
              <img src="{{ URL::asset('storage/images/content__images/pic1.jpg') }}" alt="pic" class="img-rounded img-responsive" id="picture">
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
              <p><a class="btn btn-info" href="#" role="button">Learn more</a></p>
            </div>
            <div class="col-md-6">
              <h3><a href="#">Commodo id natoque malesuada sollicitudin</a></h3>
              <p class="small-paragraph">Cras iaculis ultricies nulla.</p>
              <img src="{{ URL::asset('storage/images/content__images/pic2.jpg') }}" alt="pic" class="img-rounded img-responsive" id="picture">
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
              <p><a class="btn btn-info" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="row text-left nothing line__bg testimonials">
          <div class="container">
            <h3 class="subtitle">Aliquam porttitor mauris sit amet quisque volutpat.</h3>
            <p class="small-paragrapher">Maecenas fermentum semper porta.</p>
            <img src="{{ URL::asset('storage/images/line_bg.jpg') }}" class="img-responsive img-rounded">
            <p style="color:#fff;">Donec fringilla vitae ligula vitae facilisis. Vivamus consectetur tincidunt lorem a bibendum. Sed fermentum ac ante sit nec amet convallis suspendisse potenti suspendisse mollis. Tortor nec iaculis tempor, orci augue dignissim nibh, id modo risus purus at nibh. Curabitur ac urna felis phasellus onvallis leo orci, sit amet feugiat nunc pretium fringilla. Morbi nec nulla a magna porta ullamcorper eget sit amet metus duis varius est ut lectus malesuada tincidunt vitae ut velit ac nunc.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
          </div>
        </div>
      </section>
@endsection