<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags always come first -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  
  <title>{{is_null(setting('site.title'))?'': setting('site.title').'-'}}404</title>

  <link rel="shortcut icon" type="image" href="{{is_null(setting('site.logo'))?'': Storage::url(setting('site.logo'))}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('frontend/css/fontawesome-free/css/all.min.css')}}">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{asset('frontend/css/mdb.min.css')}}" rel="stylesheet">
  
  @yield('custom-styles')

</head>

<body class="fixed-sn">

    <div class="container my-5 py-5 z-depth-1">
 
        <!--Section: Content-->
        <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-4 mb-md-0">

                    <h3 class="font-weight-bold">404 - Page not found</h3>

                    <p class="text-muted">Uh oh, we can’t seem to find the page you’re looking for. Try going back to the previous page or click the button below.</p>

                    <a class="btn btn-purple btn-md ml-0" href="/" role="button">Go Home</a>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-4 mb-md-0">

                    <!--Image-->
                    <div class="view overlay z-depth-1-half">
                        <img src="{{asset('frontend/img/404.png')}}" class="img-fluid" alt="404 image">
                    </div>

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </section>
        <!--Section: Content-->

    </div>

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

    @yield('javascript')
</body>

</html>
