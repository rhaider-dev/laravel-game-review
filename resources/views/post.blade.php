@extends('layouts.app')

@section('meta-tags')
<meta name="title" content="{{$post->seo_title}}">
<meta name="description" content="{{$post->meta_description}}">
<meta name="keywords" content="{{$post->meta_keywords}}">
@stop

@section('title', $post->title)

@section('content')
<!-- Main layout -->
<main class="mt-5 pt-5 mb-5">
    <div class="container">

        <!-- Magazine -->
        <div class="row mt-2">

            <!-- Main news -->
            <div class="col-xl-8 col-md-12">

                <!-- Post -->
                <div class="row mt-2 mb-5 pb-3 mx-2">

                    <!--Card-->
                    <div class="card card-body mb-5">

                        <a>
                            <span class="badge badge-danger">{{is_null($post->category)?"Uncategorized":$post->category->name}}</span>
                        </a>

                        <!--Title-->
                        <h2 class="font-weight-bold mt-3">
                            <strong>{{$post->title}}</strong>
                        </h2>
                        <hr class="red title-hr">

                        <img data-src="{{is_null($post->image)? asset('frontend/img/default-igame.png'):Voyager::image($post->image)}}" class="img-fluid z-depth-1 rounded lazyload" alt="post image">

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6 mt-4">

                                <h5 class="font-weight-bold dark-grey-text">
                                <i class="far fa-lg fa-newspaper mr-3 dark-grey-text"></i>
                                <strong>{{$post->created_at->diffForHumans()}}</strong></h5>

                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <hr>

                        {!!$post->body!!}
                        
                        <hr>

                        <!--Grid row-->
                        <div class="row mb-4">

                            <!--Grid column-->
                            <div class="col-md-12 text-center">

                                <h4 class="text-center font-weight-bold dark-grey-text mt-3 mb-3">
                                    <strong>Share this post: </strong>
                                </h4>
                                
                                <a href="http://www.facebook.com/sharer.php?s=100&amp;p[title]={{$post->title}}&amp;p[summary]={{$post->excerpt}}&amp;p[url]={{request()->url()}}&amp;p[images[0]={{is_null($post->image)? asset('frontend/img/default-igame.png'):Voyager::image($post->image)}}" onclick="window.open(this.href, 'facebookwindow','left=20,top=20,width=600,height=700,toolbar=0,resizable=1'); return false;" type="button" class="btn btn-fb btn-sm">
                                    <i class="fab fa-facebook-f left"></i> Facebook
                                </a>
                                
                                    
                                <!--Twitter-->
                                <a href="http://twitter.com/intent/tweet?text={{request()->url()}}" onclick="window.open(this.href, 'twitterwindow','left=20,top=20,width=600,height=300,toolbar=0,resizable=1'); return false;" type="button" class="btn btn-tw btn-sm">
                                    <i class="fab fa-twitter left"></i> Twitter
                                </a>

                                <!--LinkedIn-->
                                <a href="http://www.linkedin.com/shareArticle?url={{request()->url()}}&title={{$post->slug}}" onclick="window.open(this.href, 'linkedinwindow','left=20,top=20,width=600,height=700,toolbar=0,resizable=1'); return false;" type="button" class="btn btn-tw btn-sm">
                                    <i class="fab fa-linkedin-in left"></i> LinkedIn
                                </a>


                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->
                    </div>
                    <!--/.Card-->
                    
                </div>
                <!--/ Post -->
                
                <!--Disqus-->
                <div id="disqus_thread"></div>
                <!--/ Disqus -->
                
                <h5 class="font-weight-bold mt-3">
                    <strong>YOU MIGHT ALSO LIKE</strong>
                </h5>
                <hr class="red title-hr">

                <!--Grid row-->
                <div class="row single-post mb-4">

                    @if($might_like->count()==0)
                        No items to show
                    @else
                        @foreach($might_like as $post)
                        
                            <!--Grid column-->
                            <div class="col-md-6 my-3">
                                <!--Card-->
                                <div class="card h-100">

                                    <!--Card image-->
                                    <div class="view overlay">
                                        <img data-src="{{is_null($post->image)? asset('frontend/img/default-igame.png'):Voyager::image($post->image)}}" class="card-img-top lazyload" alt="latest-news">
                                        <a>
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>
                                    <!--/.Card image-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--Title-->
                                        <h4 class="card-title"><strong>{{$post->title}}</strong></h4>
                                        <hr>
                                        <!--Text-->
                                        <p class="card-text mb-3">{{Str::words($post->excerpt,20)}}</p>
                                    </div>
                                    <!--/.Card content-->
                                    <p class="font-small font-weight-bold dark-grey-text mb-1 ml-3"><i class="far fa-clock-o"></i>
                                        {{$post->created_at->diffForHumans()}}
                                    </p>
                                    <p class="text-right font-small font-weight-bold mb-3 mr-3"><a href="/posts/{{$post->slug}}">read more <i class="fas fa-angle-right"></i></a></p>
                                </div>
                                <!--/.Card-->

                            </div>
                            <!--Grid column-->
               
                        @endforeach
                    @endif    

                </div>
                <!--/Grid row-->

                </section>
                <!--/Section: Magazine posts-->

            </div>
            <!--/ Main news -->

            @include('partials.sidebar')
            
        </div>
        <!--/ Magazine -->
    </div>
</main>
<!--/ Main layout -->
@stop