<!-- Sidebar -->
<div class="col-xl-4 col-md-12 widget-column mt-0">

    <!-- Section: Categories -->
    <section class="section mb-5">

        <h4 class="font-weight-bold mt-2"><strong>CATEGORIES</strong></h4>
        <hr class="red title-hr">

        <ul class="list-group z-depth-1 mt-4">
            @if($categories->count()>0)
                @foreach($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="/category/{{$category->slug}}">{{$category->name}}</a>
                    <span class="badge badge-danger badge-pill">{{$category->posts->count()}}</span>
                </li>
                @endforeach
            @endif
        </ul>
    </section>
    <!-- Section: Categories -->

    <h4 class="font-weight-bold"><strong>POPULAR POSTS</strong></h4>
    <hr class="red title-hr mb-4">

    <!--Carousel Wrapper-->
    <div id="carousel-sidebar" class="carousel slide carousel-fade" data-ride="carousel">
   
    <!--Slides-->
    <div class="carousel-inner" role="listbox">

        @if($popular_sidebar->count()>0)
            @foreach($popular_sidebar as $post)
            <div class="carousel-item {{$loop->first?"active":""}}">
                <div class="view h-100">
                    <img class="d-block w-100 lazyload" style="height:400px !important;" data-src="{{is_null($post->image)? asset('frontend/img/default-igame.png'):Voyager::image($post->image)}}" alt="popular-sidebar image">
                    <div class="mask rgba-black-strong"></div>
                </div>
                <div class="carousel-caption">
                    <h3 class="h3-responsive font-weight-bold"><a href="/posts/{{$post->slug}}" style="color: white !important;">{{Str::words($post->title,10)}}</a></h3>
                    <p>{{Str::words($post->excerpt,10)}}</p>
                </div>
            </div>

            @endforeach
        @endif
        
    </div>
    <!--/.Slides-->

    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-sidebar" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-sidebar" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->

    @if(!is_null(setting('site.sidebar_ad')))
        <!-- Section: Advertisment -->
        <section class="section mt-5">

            <h6 class="grey-text text-center mb-3"><strong>- Advertisment -</strong></h6>

            {!!setting('site.sidebar_ad')!!}
        </section>
        <!--/ Section: Advertisment -->

    @endif
    
    
    <!-- Section: Featured posts -->
    <section class="section mt-5">
        <!-- Heading -->
        <h4 class="font-weight-bold pt-2"><strong>FEATURED POSTS</strong></h4>
        <hr class="red title-hr mb-4">

        
        <div class="card card-body pb-0">
            @if($featured_sidebar->count()>0)
                @foreach($featured_sidebar as $post)
                    
                <div class="single-post pb-3">

                    <!-- Grid row -->
                    <div class="row">
                        <div class="col-4">

                        <!-- Image -->
                        <div class="view overlay">
                            <img data-src="{{is_null($post->image)? asset('frontend/img/default-igame.png'):Voyager::image($post->image)}}" class="img-fluid rounded-0 lazyload"
                            alt="featured image">
                            <a>
                            <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        </div>

                        <!-- Excerpt -->
                        <div class="col-8">
                        <h6 class="mt-0 mb-3"><a href="/posts/{{$post->slug}}"><strong>{{$post->title}}</strong></a></h6>

                        <div class="post-data">
                            <p class="font-small grey-text mb-0"><i class="far fa-clock-o"></i>{{$post->created_at->diffForHumans()}}</p>
                        </div>
                        </div>
                        <!--/ Excerpt -->
                    </div>
                    <!--/ Grid row -->
                    
                    <hr>
                </div>

                @endforeach
            @endif
        </div>

    </section>
    <!--/ Section: Featured posts -->
</div>
<!--/ Sidebar -->