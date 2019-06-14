@extends('inc.index')

@section('content')
<section class="main__middle__container">
        <section class="recent-posts">
      <div class="container">
        <div class="row no-margin nothing">
          <div class="col-md-9 ">
            <h2>News/ Events</h2>
            @if (count($news)>0)
            @foreach ($news as $new)
              <article> <img src="/storage/uploads/news/{{ $new->image }}" alt="pic1" class="pull-left img-responsive">
                <div class="text">
                  <h3><a>{{ $new->head }}</a></h3>
                  
                  <p>{{ $new->body }}</p>
                </div>
                <div class="clearfix"></div>
              </article>
            @endforeach
            @else
                <div class="container-fluid text-center">
                  <h3>Currently no News!</h3>
                </div>
            @endif
            
            
          </div>
          <div class="col-md-3">
            <h3>Recent News/ Events</h3>
            @if (count($news)>0)
                @foreach ($news as $new)
                    <div class="icon-item">
                      <h4><a href="#">{{ $new->head }}</a></h4> 
                    </div>
                @endforeach

            @endif
            
            
            
          </div>
        </div>
      </div>
    </section>
</section>
    
@endsection