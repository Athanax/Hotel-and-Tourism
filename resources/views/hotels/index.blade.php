@extends('inc.index')

@section('content')
<section class="main__middle__container">
    <!-- Room Review -->
    <div class="container justify-content-between">
        <div class="room-review-area col-md-offset-2 justify-content-between mb-100 col-md-8" style="padding:0">
            <h4 class="text-center">Hotels</h4>
                <!-- Recent Post -->
                <div class="single-widget-area  mb-100">
                    

                    @if ($hotels)
                        @foreach ($hotels as $hotel)
                            
                            <!-- Single Recent Post -->
                            <div class="single-recent-post  d-flex">
                                <!-- Thumb -->
                                <div class="post-thumb">
                                    <a href="/hotels/{{ $hotel->id }}"><img src="/storage/uploads/hotels/about/{{ $hotel->about_image }}" alt=""></a>
                                </div>
                                <!-- Content -->
                                <div class="post-content">
                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <a href="/hotels/{{ $hotel->id }}" class="post-author">{{ $hotel->name }}</a>
                                        <a href="/hotels/{{ $hotel->id }}" class="post-tutorial">{{ $hotel->type }}</a>
                                    </div>
                                    <p>{{ $hotel->about }}</p>
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