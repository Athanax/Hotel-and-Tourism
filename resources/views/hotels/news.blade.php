@extends('inc.hotel')

@section('content')
    
    <!-- Blog Area Start -->
    <div class="roberto-news-area section-padding-100-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <h3>News and Events</h3>
    
                        @if (count($news)>0)
                        @foreach ($news as $new)
                            <!-- Single Blog Post Area -->
                            <div class="single-blog-post d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <a href="#"><img src="/storage/uploads/news/{{ $new->image }}" alt=""></a>
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <!-- Post Meta -->
                                    <div class="post-mea">
                                        <a  class="post-author pull-right text-muted">{{ $new->created_at }}</a>
                                        {{-- <a " class="post-tutorial">Event</a> --}}
                                    </div>
                                    <!-- Post Title -->
                                    <a  class="post-title">{{ $new->head }}</a>
                                    <p>{{ $new->body }}</p>
                                </div>
                            </div>
                        @endforeach
                        
                        @else
                        <div class="container-fluid text-center">
                            <div class="alert alert-warning">
                                <strong>Currently no news</strong>
                            </div>
                        </div>
                        @endif
                        
    
                    </div>
    
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                        <div class="roberto-sidebar-area pl-md-4">
    
                            
                            <!-- Recent Post -->
                            <div class="single-widget-area mb-100">
                                <h4 class="widget-title mb-30">Recent News</h4>
                                @if (count($news)>0)
                                    @foreach ($news as $new)
                                        <!-- Single Recent Post -->
                                        <div class="single-recent-post d-flex">
                                            <!-- Thumb -->
                                            <div class="post-thumb">
                                                <a ><img src="/storage/uploads/news/{{ $new->image }}" alt=""></a>
                                            </div>
                                            <!-- Content -->
                                            <div class="post-content">
                                                <!-- Post Meta -->
                                                <div class="post-meta">
                                                    <a  class="post-author">{{ $new->created_at }}</a>
                                                    <a  class="post-tutorial">News and Events</a>
                                                </div>
                                                <a  class="post-title">{{ $new->head }}</a>
                                            </div>
                                </div>
                                    @endforeach

                                @else
                                    <div class="container-fluid text-center">
                                        <div class="alert alert-warning">
                                            <strong>Currently no news</strong>
                                        </div>
                                    </div>
                                @endif
                               
    
                                
                            </div>
    
                         
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Area End -->
    
@endsection