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

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="{{ asset('photo-gallery/photo-gallery.js') }}"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <style type="text/css">

        .row:before, .row:after {display: none !important;}

        .btn:focus, .btn:active, button:focus, button:active {
            outline: none !important;
            box-shadow: none !important;
        }

        #image-gallery .modal-footer{
            display: block;
        }

        .thumb{
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .modal-backdrop {
            z-index: -1;
        }

        .flat {
            border: 0px!important;
            margin: 0px!important;
            padding: 0px!important;
        }


    </style>

</head>

<body>

    <div class="worksajax clearfix">
        <div class="content align-center clearfix" style="padding-top: 10px">
            <div class="container work-content">
                {{--<a href="{{ route('home') }}">Home</a>--}}
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

                <div class="worksajax clearfix">
                    <div class="content align-center clearfix " style="padding-top: 10px">
                        <div class="container work-content">

                            <div class="row">

                                @foreach($works as $work)

                                    <div class="gal-box col-lg-4 col-md-4 col-xs-4 flat">
                                        <a class="thumbnail flat" href="#" data-image-id="" data-toggle="modal" data-title="{!! $work->title !!}"
                                           data-body="{!! $work->body !!}"
                                           data-image="{!! ($work->mainImage())? asset('imagenes/'.$work->mainImage()->path) : '' !!}"
                                           data-target="#image-gallery">
                                            <div class="hovers">
                                                <div class="gal-detail">
                                                    <h4>{!! $work->title !!}</h4>

                                                    <p>{!! $work->body !!}</p>
                                                </div><!--gal-detail-->
                                            </div><!--/.hovers-->
                                            <img src="{!! ($work->mainImage())? asset('imagenes/thumb-'.$work->mainImage()->path) : '' !!}" alt="">
                                        </a>
                                    </div>

                                @endforeach

                            </div>

                            {!! $works->render() !!}

                            <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title" id="image-gallery-title"></h4>
                                            <p id="image-gallery-body"></p>
                                        </div>
                                        <div class="modal-body">
                                            <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i></button>
                                            <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <div class="spacing40"></div>

                    </div>
                </div>

                {{--<div class="row">--}}
                    {{--@foreach($works as $work)--}}

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

                        {{--<div class="gal-box col-lg-4 col-sm-4 col-xs-4">--}}
                            {{--<a href="{!! ($work->mainImage())? asset('imagenes/'.$work->mainImage()->path) : '' !!}" data-rel="prettyPhoto[gallery]">--}}
                                {{--<div class="hovers">--}}
                                    {{--<div class="gal-detail">--}}
                                        {{--<h4>{!! $work->title !!}</h4>--}}

                                        {{--<p>{!! $work->body !!}</p>--}}
                                    {{--</div><!--gal-detail-->--}}
                                {{--</div><!--/.hovers-->--}}
                                {{--<img alt="{!! $work->title !!} - {!! $work->body !!}" src="{!! ($work->mainImage())? asset('imagenes/thumb-'.$work->mainImage()->path) : '' !!}">--}}
                            {{--</a>--}}
                        {{--</div><!--/.gal-box-->--}}

                    {{--@endforeach--}}
                {{--</div>--}}

            </div><!--/.container-->
            <div class="spacing40"></div>

        </div>
    </div><!--/.worksajax-->


    <script>

        let modalId = $('#image-gallery');

        $(document)
            .ready(function () {


                loadGallery(true, 'a.thumbnail');

                //This function disables buttons when needed
                function disableButtons(counter_max, counter_current) {
                    $('#show-previous-image, #show-next-image')
                        .show();
                    if (counter_max === counter_current) {
                        $('#show-next-image')
                            .hide();
                    } else if (counter_current === 1) {
                        $('#show-previous-image')
                            .hide();
                    }
                }

                /**
                 *
                 * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
                 * @param setClickAttr  Sets the attribute for the click handler.
                 */

                function loadGallery(setIDs, setClickAttr) {

                    let current_image,
                        selector,
                        counter = 0;

                    $('#show-next-image, #show-previous-image')
                        .click(function () {
                            if ($(this)
                                .attr('id') === 'show-previous-image') {
                                current_image--;
                            } else {
                                current_image++;
                            }

                            selector = $('[data-image-id="' + current_image + '"]');
                            updateGallery(selector);
                        });

                    function updateGallery(selector) {
                        let $sel = selector;
                        current_image = $sel.data('image-id');
                        $('#image-gallery-title')
                            .text($sel.data('title'));
                        $('#image-gallery-body')
                            .text($sel.data('body'));
                        $('#image-gallery-image')
                            .attr('src', $sel.data('image'));
                        disableButtons(counter, $sel.data('image-id'));
                    }

                    if (setIDs == true) {
                        $('[data-image-id]')
                            .each(function () {
                                counter++;
                                $(this)
                                    .attr('data-image-id', counter);
                            });
                    }
                    $(setClickAttr)
                        .on('click', function () {
                            updateGallery($(this));
                        });
                }

            });

        // build key actions
        $(document)
            .keydown(function (e) {

                switch (e.which) {
                    case 37: // left
                        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
                            $('#show-previous-image')
                                .click();
                        }
                        break;

                    case 39: // right
                        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
                            $('#show-next-image')
                                .click();
                        }
                        break;

                    default:
                        return; // exit this handler for other keys
                }
                e.preventDefault(); // prevent the default action (scroll / move caret)
            });


    </script>

    <!-- The javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    {{--<script type="text/javascript" src="{{ asset('template-web/js/modernizr.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('template-web/js/jquery.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('template-web/js/jquery.easing.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('template-web/js/jquery.imagesloaded.min.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('template-web/js/bootstrap.min.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('template-web/js/isotope.pkgd.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('template-web/js/jquery.fitvids.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('template-web/js/jquery.prettyPhoto.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('template-web/js/owl.carousel.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('template-web/js/jquery.imagesloaded.min.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('template-web/js/portfolio.js') }}"></script>--}}

</body>
</html>