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
        <div class="content align-center clearfix" style="padding-top: 10px">
            <div class="container work-content">
                <a href="{{ route('home') }}">Home</a>
                <h3 class="content-title" style="margin-top: 8px">WORKS</h3>
                <div class="title-border"></div>
                <div class="port-attr clearfix">
                    <ul class="port-filter clearboth clearfix">
                        <li><a data-filter=".future" href="{{ route('works', '2019')  }}">2019</a></li>
                        <li><a data-filter=".present" href="{{ route('works', '2018')  }}">2018</a></li>
                        <li><a data-filter=".past" href="{{ route('works', '2017')  }}">2017</a></li>
                        <li><a data-filter=".past" href="{{ route('works', '2016')  }}">2016</a></li>
                        <li><a data-filter=".past" href="{{ route('works', '2015')  }}">2015</a></li>
                        <li><a data-filter=".past" href="{{ route('works', '2014')  }}">2014</a></li>
                    </ul>
                </div>

                <div class="row">
                    @foreach($works as $work)

                        {{--<div style="background-color: #2a2b32; height: 100%; padding: 0px; margin:0px" class="col-lg-4 col-sm-6 col-xs-12">--}}
                            {{--<a data-rel="prettyPhoto[gallery]" href="{!! ($work->mainImage())? asset('imagenes/'.$work->mainImage()->path) : '' !!}">--}}
                                {{--<span><i class="fa fa-search"></i></span>--}}
                                {{--<img alt="works" style="width: 100%" src="{!! ($work->mainImage())? asset('imagenes/thumb-'.$work->mainImage()->path) : '' !!}">--}}
                            {{--</a>--}}
                            {{--<div class="panel-body" style="margin: 0px; padding: 0px; min-height: 90px">--}}
                                {{--<span style="color: white; margin: 0px; padding: 0px">{!! $work->title !!}</span><br>--}}
                                {{--<small style="margin: 0px; padding: 0px">{!! $work->body !!}</small>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="gal-box col-lg-4 col-sm-4 col-xs-4">
                            <a href="{!! ($work->mainImage())? asset('imagenes/'.$work->mainImage()->path) : '' !!}" data-rel="prettyPhoto[gallery]">
                                <div class="hovers">
                                    <div class="gal-detail">
                                        <h4>{!! $work->title !!}</h4>

                                        <p>{!! $work->body !!}</p>
                                    </div><!--gal-detail-->
                                </div><!--/.hovers-->
                                <img alt="{!! $work->title !!} - {!! $work->body !!}" src="{!! ($work->mainImage())? asset('imagenes/thumb-'.$work->mainImage()->path) : '' !!}">
                            </a>
                        </div><!--/.gal-box-->

                    @endforeach
                </div>

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



































{{--@extends('web.layout')--}}

{{--@section('content')--}}

    {{--<!--WORKS START-->--}}
    {{--<div id="social" class="content clearfix">--}}

        {{--<div class="container">--}}
            {{--<div class="top-content clearfix">--}}
                {{--<h3 class="content-title">WORKS</h3>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div id="port-body" class="port-body clearfix">--}}

            {{--@forelse($works as $work)--}}

                {{--<div class="col-md-4  col-sm-6 port-item brand future">--}}
                    {{--<a class="port-ajax" href="">--}}
                        {{--<div class="hovers">--}}
                            {{--<div class="hover-detail">--}}
                                {{--<h4>{!! $work->title !!}</h4>--}}
                                {{--<i class="icon-detail fa fa-bug"></i>--}}
                                {{--<p>{!! $work->body !!}</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<img src="{!! ($work->mainImage())? asset('imagenes/'. $work->mainImage()->path) : asset('imagenes/'. $work->images->first()->path) !!}" alt="portfolio">--}}
                    {{--</a>--}}
                {{--</div>--}}

            {{--@empty--}}

                {{--<span>No hay ningún trabajo para mostrar</span>--}}

            {{--@endforelse--}}

        {{--</div>--}}

        {{--<div id="worksajax"></div>--}}
        {{--<div class="worksajax clearboth clearfix"></div>--}}

    {{--</div>--}}

{{--@endsection--}}