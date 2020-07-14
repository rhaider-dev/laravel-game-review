@extends('layouts.app')

@section('title', $category->name)

@section('content')

<!-- Jumbotron -->
<div class="card card-image mt-5" style="background-image: url('{{asset('frontend/img/header-bg.jpg')}}');">
  <div class="text-white text-center rgba-stylish-light py-5 px-4">
    <div class="py-5">

      <!-- Content -->
      <h1 class="card-title h1 my-5 py-2 text-uppercase font-weight-bold">{{$category->name}}</h1>
    </div>
  </div>
</div>
<!-- Jumbotron -->

<!-- Main Container -->
<main class="mt-5"> 
    <div class="container mt-5 pt-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif            
        <div class="row">

            <!-- Sidebar -->
            <div class="col-lg-3">

                <div class="container">
                    <!-- Grid row -->
                    <div class="row">

                        <div class="col-md-6 col-lg-12 mb-5">
                            <!-- Panel -->
                            <h5 class="font-weight-bold dark-grey-text"><strong>Search</strong></h3>
                            <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                            <!-- Search form -->
                            <form action="{{route('games.category',['slug'=>$category->slug])}}" method="GET">
                                <input class="form-control" name="query" value="{{request()->input('query')}}" type="text" placeholder="Search" aria-label="Search">
                            </form>
                            
                        </div>
                        
                        <div class="col-md-6 col-lg-12 mb-5">
                            <!-- Panel -->
                            <h5 class="font-weight-bold dark-grey-text"><strong>Order By</strong></h3>
                            <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                            <p class="dark-grey-text"><a href="/games/category/{{$category->slug}}">Default</a></p>
                            <p class="dark-grey-text"><a href="{{route('games.category',['slug'=>$category->slug,'query'=>request()->input('query'),'sort'=>'low_high'])}}">Rating: low to high</a></p>
                            <p class="dark-grey-text"><a href="{{route('games.category',['slug'=>$category->slug,'query'=>request()->input('query'),'sort'=>'high_low'])}}">Rating: high to low</a></p>
                        </div>

                        <!-- Filter by category-->
                        <div class="col-md-6 col-lg-12 mb-5">
                            <h5 class="font-weight-bold dark-grey-text"><strong>Category</strong></h3>
                            <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">

                            <!--list group-->
                            <ul class="list-group z-depth-1">
                                @if($categories->count()>0)
                                    @foreach($categories as $category)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="/games/category/{{$category->slug}}">{{$category->name}}</a>
                                        <span class="badge badge-danger badge-pill">{{$category->games->count()}}</span>
                                    </li>
                                    @endforeach
                                @endif
                            </ul>
                            <!--list group-->
                        </div>
                        <!-- /Filter by category-->
                    </div>
                    <!-- /Grid row -->

                </div>

            </div>
            <!-- /.Sidebar -->

            <!-- Content -->
            <div class="col-lg-9">

                <!-- Products Grid -->
                <section class="section">

                    @if($latest_games->count()>0)
                        @foreach($latest_games->chunk(3) as $items)
                            <div class="row">
                            @foreach($items as $game)
                                <!--Grid column-->
                                <div class="col-lg-4 col-md-12 mb-4">

                                <!--Card-->
                                <div class="card h-100">

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

                                        <h5 class="card-title mb-1"><strong><a href="/game/{{$game->slug}}" class="dark-grey-text">{{$game->title}}</a></strong></h5><span class="badge badge-danger mb-2">{{is_null($game->category)?"Uncategorized":$game->category->name}}</span>
                                        
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
                            </div>
                        @endforeach
                    @else
                        No items to show
                    @endif

                </section>
                <!-- /.Products Grid -->
            </div>
        </div>    

    </div>

    <div class="container">
        <!--Grid row-->
        <div class="row justify-content-center mt-4 mb-4">

            <!--Pagination -->
            <nav class="mb-4">
                <ul class="pagination pg-blue mb-0">
                    {{$latest_games->appends(request()->query())->links()}}
                </ul>
            </nav>
            <!--/Pagination -->

        </div>
        <!--Grid row-->
    </div>
   

</main>
<!-- /.Main Container -->
@stop