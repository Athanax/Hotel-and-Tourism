@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="box box-success">
                <div class="box-header text-center">
                    <h3 class="box-title">Create News/Event</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('home.store_news') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" class="form-control" name="new_type" value="home">
                        <input type="hidden" class="form-control" name="type_id" value="1">
                        <input type="hidden" class="form-control" name="new_type" value="home">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Heading</label>
                                    <input required type="text" class="form-control" name="head">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input required type="file" class="form-control" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">News/ Event Body</label>
                            <textarea required class="form-control" name="body" id="" cols="" rows=""></textarea>
                        </div>
                        <button type="submit" class="btn btn-success pull-right">Publish <i class="fa fa-send"></i> </button>
                    </form>
                </div>
            </div>
            <div class="box-footer box-comments">
                @if (count($news)>0)
                    @foreach ($news as $new)
                        <div class="box-comment">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="/storage/uploads/news/{{ $new->image }}" alt="User Image">
            
                            <div class="comment-text">
                                  <span class="username">
                                    <h4>{{ $new->head }}</h4>
                                  <span class="text-info pull-right">{{ $new->created_at }}</span>
                                  </span><!-- /.username -->
                             {{ $new->body }}
                            </div>
                            <!-- /.comment-text -->
                            @if ($new->status=='ready')
                                <form action="{{ route('home.publish') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="task" value="blocked">
                                    <input type="hidden" name="id" value="{{ $new->id }}">
                                    <button type="submit" class="btn btn-success pull-right">Unpublish  <i class="fa fa-remove"></i></button>
                                </form>
                            @else
                                <form action="{{ route('home.publish') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="task" value="ready">
                                    <input type="hidden" name="id" value="{{ $new->id }}">
                                    <button type="submit" class="btn btn-success pull-right">Publish  <i class="fa fa-remove"></i></button>
                                </form>
                                
                            @endif
                            
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
        <div class="col-md-4">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Recent News/Events</h3>
                </div>
                <div class="box-body">
                    @if (count($news)>0)
                       @foreach ($news as $new)
                       <ul class="products-list product-list-in-box">
                            <li class="item">
                                <div class="product-img">
                                <img src="/storage/uploads/news/{{ $new->image }}" alt="Product Image">
                                </div>
                                <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">{{ $new->head }}
                                    <span class="label label-warning pull-right">{{ $new->id }}</span></a>
                                <span class="product-description">
                                        {{ $new->body }}
                                    </span>
                                </div>
                            </li> 
                        </ul>
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
@endsection