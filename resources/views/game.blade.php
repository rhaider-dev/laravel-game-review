@extends('layouts.app')

@section('meta-tags')
<meta name="title" content="{{$game->title}}">
<meta name="description" content="{{$game->short_description}}">
@stop

@section('title',$game->title)

@section('content')

<main class="mt-5 mb-5">
    <!-- Main Container -->
    <div class="container mt-5 pt-3">

        <!-- Section: product details -->
            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-6 mb-4">

                <img data-src="{{is_null($game->image)? asset('frontend/img/default-igame.png'):Voyager::image($game->image)}}" class="img-fluid lazyload" alt="game image">

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-4">

                <!--Content-->
                <div class="p-4">

                    <div class="mb-3">
                       
                        <span class="badge purple mr-1">{{is_null($game->category)?"Uncategorized":$game->category->name}}</span>
                        
                    </div>

                    <h1 class="h1 py-1 text-uppercase font-weight-bold">{{$game->title}}</h1>
                    <p class="font-weight-bold"><i class="fas fa-star blue-text"></i> {{$game->rating}}</p>
                    <p class="lead font-weight-bold">
                        <span>${{number_format((float)$game->price, 2, '.', '')}}</span>
                    </p>

                    <div class="mb-5">
                        {!!$game->short_description!!}
                        <br><br>
                        <p><strong>Publisher: </strong>{{$game->publisher}}</p>
                        <p><strong>Platform: </strong>{{$game->platform}}</p>
                        <p><strong>Release Date: </strong>{{$game->release_date}}</p>
                    </div>
                
                    <a href="//{{$game->affiliate_link}}" target="_blank"class="btn btn-primary btn-md my-0 p">Buy Now</a>

                

                </div>
                <!--Content-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
            <hr> 
        <!-- Section: product details -->

        <!--Section:additional details-->
        <!--Grid row-->
        <div class="row d-flex justify-content-center wow fadeIn">

            <!--Grid column-->
            <div class="col-md-6 text-center">

                <h4 class="my-4 h4">Review</h4>

            </div>
            <!--Grid column-->
             
        </div>
         
        {!!$game->long_description!!}
        <hr>
        
        <!-- ./Section:additional details -->

        <!--Section:Disqus-->
        <div id="disqus_thread"></div>
        <hr>
        <!--/.Section:Disqus-->

        <!--Section:you might like-->
        
        <!--Grid row-->
        <div class="row d-flex justify-content-center wow fadeIn">
            <!--Grid column-->
            <div class="col-md-6 text-center">

                <h4 class="my-4 h4">You Might Like</h4>

            </div>
            <!--Grid column-->

        </div> 
        
        <!-- Grid row -->
        <div class="row single-post mb-4">
            @if ($might_like->count()==0)
                No items to show
            @else
                @foreach($might_like as $game)
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 my-3">

                        <!--Card-->
                        <div class="card card-ecommerce h-100">

                            <!--Card image-->
                            <div class="view overlay">
                                <img data-src="{{is_null($game->image)? asset('frontend/img/default-igame.png'):Voyager::image($game->image)}}" style="height:250px !important; width:100%;" class="img-fluid lazyload" alt="game image">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <!--Card image-->

                            <!--Card content-->
                            <div class="card-body">
                                <!--Category & Title-->
                                <h5 class="card-title mb-1"><strong><a href="/game/{{$game->slug}}" class="dark-grey-text">{{$game->title}}</a></strong></h5>
                                <!-- Rating -->
                                <ul class="list-group list-group-horizontal-sm list-unstyled">
                                    <li><i class="fas fa-star blue-text"></i><strong> {{$game->rating}}</strong></li>
                                </ul>
                            </div>
                            <!--Card content-->

                        </div>
                        <!--Card-->

                    </div>
                    <!--Grid column-->
                @endforeach
            @endif   

        </div>
        <!--Grid row-->
           
        <!-- /.Section:you might like -->

    </div>
    <!-- /.Main Container -->

</main>
@stop