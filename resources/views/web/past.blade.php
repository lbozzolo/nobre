<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Nobre Management - Agencia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="{{ asset('template-web/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template-web/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template-web/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('template-web/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('template-web/css/style.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,700,700italic,600italic,600&amp;subset=latin,greek-ext,cyrillic-ext,greek,vietnamese,cyrillic' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="{{ asset('template-web/images/favicon.png') }}">
</head>

<body>

    <div class="worksajax clearfix">
        <div class="content align-center clearfix">
            <div class="container work-content">
                <h3 class="content-title">PAST</h3>
                <div class="title-border"></div>
                <div class="port-attr clearfix">

                </div>
                <div class="portfolio-gallery clearfix">

                    @forelse($past_big as $image)

                        <div>
                            <a data-rel="prettyPhoto[gallery]" href="{!! asset('imagenes/'.$image->path) !!}" >
                                <span><i class="fa fa-search"></i></span>
                                <img alt="works" src="{!! asset('imagenes/'.$image->path) !!}">
                            </a>
                        </div>

                    @empty

                        <span>No hay ninguna imagen para mostrar</span>

                    @endforelse

                </div><!--/.portfolio-gallery-->



            </div><!--/.container-->
            <div class="spacing40"></div>

        </div>
    </div><!--/.worksajax-->

    <!-- The javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="{{ asset('template-web/js/modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-web/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-web/js/jquery.easing.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-web/js/jquery.imagesloaded.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-web/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-web/js/isotope.pkgd.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-web/js/jquery.fitvids.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-web/js/jquery.prettyPhoto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-web/js/owl.carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-web/js/jquery.imagesloaded.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template-web/js/portfolio.js') }}"></script>

</body>
</html>