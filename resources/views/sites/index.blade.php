@extends('inc.index')

@section('content')
<section class="main__middle__container">
    <!-- Room Review -->
    <div class="container justify-content-between">
        <div class="room-review-area col-md-offset-2 justify-content-between mb-100 col-md-8" style="padding:0">
            <h4 class="text-center">Attraction sites</h4>
                <!-- Recent Post -->
                <div class="single-widget-area  mb-100">
                    

                    @if ($attractions)
                        @foreach ($attractions as $site)
                            
                            <!-- Single Recent Post -->
                            <div class="single-recent-post  d-flex">
                                <!-- Thumb -->
                                <div class="post-thumb">
                                    <a href="/sites/{{ $site->id }}"><img src="/storage/uploads/sites/about/{{ $site->overview_image }}" alt=""></a>
                                </div>
                                <!-- Content -->
                                <div class="post-content">
                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <a href="/sites/{{ $site->id }}" class="post-author">{{ $site->name }}</a>
                                        <a href="/sites/{{ $site->id }}" class="post-tutorial">{{ $site->type }}</a>
                                    </div>
                                    <p>{{ $site->overview }}</p>
                                </div>
                            </div>
                                
                        @endforeach
                    @endif
            
                </div>
    
            </div>
        </div>
    </div>
    

</section>
    
@endsection