<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags always come first -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  @yield('meta-tags')
  <title>{{is_null(setting('site.title'))?'': setting('site.title').'-'}}@yield('title')</title>

  <link rel="shortcut icon" type="image" href="{{is_null(setting('site.logo'))?'': Storage::url(setting('site.logo'))}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('frontend/css/fontawesome-free/css/all.min.css')}}">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{asset('frontend/css/mdb.min.css')}}" rel="stylesheet">

  @yield('custom-styles')

</head>

<body>

    <!--Navbar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark stylish-color-dark scrolling-navbar">
      <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="/">{{is_null(setting('site.title'))?'': setting('site.title')}}</a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Links -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="/games">Reviews</a>
            <li class="nav-item"><a class="nav-link" href="/archives">News</a>
            {{menu('header_menu','partials.header-menu')}}
          </ul>
          <!-- Links -->

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            
            @if(!is_null(setting('social.linkedin'))|!is_null(setting('social.facebook'))|!is_null(setting('social.twitter')))
              @if(!is_null(setting('social.facebook')))
                <li class="nav-item">
                  <a href="//{{setting('social.facebook')}}" class="nav-link waves-effect" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
              @endif

              @if(!is_null(setting('social.twitter')))
                <li class="nav-item">
                  <a href="//{{setting('social.twitter')}}" class="nav-link waves-effect" target="_blank">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
              @endif

              @if(!is_null(setting('social.linkedin')))
                <li class="nav-item">
                  <a href="//{{setting('social.linkedin')}}" class="nav-link waves-effect" target="_blank">
                    <i class="fab fa-linkedin-in"></i>
                  </a>
                </li>
              @endif
            
            @endif
            
          </ul>

      </div>
      
      <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->

  @yield('content')

    <!--Footer-->
    <footer class="page-footer text-center text-md-left stylish-color-dark pt-0 pl-0">

    <!--Footer Links-->
    <div class="container mt-5 mb-4 text-center text-md-left">
            <div class="row mt-3">

              <!--First column-->
              <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                  <h6 class="text-uppercase font-weight-bold"><strong>{{is_null(setting('site.title'))?'': setting('site.title')}}</strong></h6>
                  <hr class="red mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                  <p>{{is_null(setting('site.description'))?'All gaming reviews and news in one place': setting('site.description')}}</p>
              </div>
              <!--/.First column-->

              <!--Second column-->
              <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                  <h6 class="text-uppercase font-weight-bold"><strong>Navigation</strong></h6>
                  <hr class="red mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                  <p><a href="/">Home</a></p>
                  <p><a href="/games">Games</a></p>
                  <p><a href="/archives">Archives</a></p>
              </div>
              <!--/.Second column-->

              <!--Third column-->
              <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                  <h6 class="text-uppercase font-weight-bold"><strong>Useful links</strong></h6>
                  <hr class="red mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                  {{menu('footer_menu','partials.footer-menu')}}
              </div>
              <!--/.Third column-->

              @if(!is_null(setting('social.linkedin'))|!is_null(setting('social.facebook'))|!is_null(setting('social.twitter')))
                <!--Fourth column-->
                <div class="col-md-4 col-lg-3 col-xl-3">
                    <h6 class="text-uppercase font-weight-bold"><strong>Social</strong></h6>
                    <hr class="red mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    @if(!is_null(setting('social.facebook')))
                      <p><i class="fab fa-facebook mr-3"></i>
                        <a href="//{{setting('social.facebook')}}" target="_blank">Facebook
                        </a>
                      </p>
                    @endif

                    @if(!is_null(setting('social.twitter')))
                      <p><i class="fab fa-twitter mr-3"></i>
                        <a href="//{{setting('social.twitter')}}" target="_blank">Twitter
                        </a>
                      </p>
                    @endif

                    @if(!is_null(setting('social.linkedin')))
                      <p><i class="fab fa-linkedin-in mr-3"></i>
                        <a href="//{{setting('social.linkedin')}}" target="_blank">LinkedIn
                        </a>
                      </p>
                    @endif
                </div>
                <!--/.Fourth column-->
              @endif
                
            </div>
        </div>
        <!--/.Footer Links-->

        <!-- Copyright-->
        <div class="footer-copyright py-3 text-center">
            <div class="container-fluid">
            © {{date('Y')}} Copyright: <a>{{is_null(setting('site.title'))?'': setting('site.title')}} </a>
            </div>
        </div>
        <!--/.Copyright -->

    </footer>
    <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="{{asset('frontend/js/jquery-3.4.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('frontend/js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('frontend/js/mdb.min.js')}}"></script>
  <!-- Initializations -->
  <script type="text/javascript">
  
    // Animations initialization
    new WOW().init();

  </script>
  <!-- lazy image -->
  <script type="text/javascript" src="{{asset('frontend/js/lazysizes.min.js')}}"></script>

    @yield('javascript')
</body>

</html>
