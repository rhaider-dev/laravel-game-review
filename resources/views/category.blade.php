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

<!--Main layout-->
<main class="mt-5 pt-5">
    <div class="container">

        <!--Section: Cards-->
        <section class="pt-4">

            @if($posts->count()==0)
                No posts to show
            @else
                @foreach($posts as $post)
                    <!--Grid row-->
                    <div class="row mt-3 wow fadeIn">

                    <!--Grid column-->
                    <div class="col-lg-5 col-xl-4 mb-4">
                        <!--Featured image-->
                        <div class="view overlay rounded z-depth-1">
                            <img data-src="{{is_null($post->image)? asset('frontend/img/default-igame.png'):Voyager::image($post->image)}}" class="img-fluid lazyload" alt="category image">
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-7 col-xl-7 ml-xl-4 mb-4">
                        <h3 class="mb-3 font-weight-bold dark-grey-text">
                            <strong>{{$post->title}}</strong>
                        </h3>
                        <p class="grey-text">{{Str::words($post->excerpt,20)}}</p>
                        <a href="/posts/{{$post->slug}}" class="btn btn-primary btn-md">Read More
                        </a>
                    </div>
                    <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <hr class="mb-5">
                @endforeach
                

                <!--Pagination-->
                <nav class="d-flex justify-content-center wow fadeIn">
                    <ul class="pagination pg-blue">
                        {{$posts->links()}}                        
                    </ul>
                </nav>
                <!--Pagination-->

            @endif    
            
        </section>
        <!--Section: Cards-->

    </div>
</main>
<!--Main layout-->
@stop