@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- Jumbotron -->
<div class="card card-image mt-5" style="background-image: url('{{asset('frontend/img/header-bg.jpg')}}');">
  <div class="text-white text-center rgba-stylish-light py-5 px-4">
    <div class="py-5">

      <!-- Content -->
      <h1 class="card-title h1 my-5 py-2 text-uppercase font-weight-bold">All gaming reviews in one place</h1>
      <p class="mb-4 pb-2 px-md-5 mx-md-5">Tons of gaming reviews and latest releases about PlayStation, Xbox, PC and more.</p>
      <a href="/games" class="btn peach-gradient">View all reviews</a>

    </div>
  </div>
</div>
<!-- Jumbotron -->

<!-- /.Main Container -->
<div class="container mt-5 mb-5">

  <!-- Grid row -->
  <div class="row pt-4">

    <!-- Content -->
    <div class="col-lg-12">

      <section>

        <h4 class="font-weight-bold mt-4 dark-grey-text"><strong>FEATURED GAMES</strong></h4>
        <hr class="mb-5">

        <!-- Grid row -->
        <div class="row">
          @if ($featured_games->count()==0)
            No items to show
          @else
            @foreach($featured_games as $game)
              <!--Grid column-->
              <div class="col-lg-3 col-md-6 mb-4">

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

      </section>

      
      <!-- Section: Last items -->
      <section>

        <h4 class="font-weight-bold mt-4 dark-grey-text"><strong>LATEST GAMES</strong></h4>
        <hr class="mb-5">

        <!-- Grid row -->
        <div class="row">
          @if ($latest_games->count()==0)
            No items to show
          @else
            @foreach($latest_games as $game)
              <!--Grid column-->
              <div class="col-lg-3 col-md-6 mb-4">

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

      </section>
      <!-- /.Section: Last items -->

      <!--Latest news-->
          
      @if($latest_posts->count()>0)
          <section>
            <h4 class="font-weight-bold mt-4 dark-grey-text"><strong>LATEST NEWS</strong></h4>
            <hr class="mb-5">

            <div class="row">
                @foreach($latest_posts as $post)
                    <!--Grid column-->
                    <div class="col-md-4 my-3">
                        <!--Card-->
                        <div class="card h-100">

                        <!--Card image-->
                        <div class="view overlay">
                            <img data-src="{{is_null($post->image)? asset('frontend/img/default-igame.png'):Voyager::image($post->image)}}" class="card-img-top lazyload" alt="post image">
                            <a>
                            <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!--/.Card image-->

                        <!--Card content-->
                        <div class="card-body">
                            <!--Title-->
                            <h4 class="card-title"><strong><a href="/posts/{{$post->slug}}">{{Str::words($post->title,10)}}</a></strong></h4>
                            <hr>
                            <!--Text-->
                            <p class="card-text mb-3">{{Str::words($post->excerpt,10)}}</p>
                            
                        </div>
                        <!--/.Card content-->
                        <p class="font-small font-weight-bold dark-grey-text mb-3 ml-3"><i class="far fa-clock-o"></i>
                            {{$post->created_at->diffForHumans()}}</p>
                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->
                @endforeach
            </div>
              
          </section>
      @endif

    </div>
    <!-- /.Content -->

  </div>
  <!-- Grid row --> 

</div>
<!-- /.Main Container -->
@stop