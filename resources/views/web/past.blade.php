@extends('web.layout')


@section('css')

    <style type="text/css">

        .modal-dialog{
            width: 57%;
            text-align: center;
        }
        .modal-content{
            display:inline-block;
        }

        @media (min-width:768px) {
            .modal{
                display:none;
            }
        }

    </style>

@endsection

@section('content')


    <!--WORKS START-->
    <div id="social" class="content clearfix">

        <div class="container">
            <div class="top-content clearfix">
                <h3 class="content-title">PAST</h3>
            </div>
        </div>

        <div id="port-body" class="port-body clearfix">

            @forelse($past_thumb as $thumb)

                <div class="col-md-4  col-sm-6 col-xs-12 port-item brand future">
                    <a href="" data-toggle="modal" data-target="#modalVerImage{!! $thumb->id !!}">
                        <div class="hovers">
                            {{--<div class="hover-detail">--}}
                                {{--<h4>FUTURE</h4>--}}
                                {{--<i class="icon-detail fa fa-bug"></i>--}}
                                {{--<p>Discos, eventos y marcas</p>--}}
                            {{--</div>--}}
                        </div>
                        <img src="{!! asset('imagenes/'.$thumb->path) !!}" alt="portfolio">
                    </a>
                </div>

            @empty

                <span>No hay ninguna imagen para mostrar</span>

            @endforelse

        </div>

        <div id="worksajax"></div>
        <div class="worksajax clearboth clearfix"></div>

    </div>

    @foreach($past_big as $imagen)

        <div class="modal fade" id="modalVerImage{!! $imagen->thumbnail_id !!}">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-body">

                        <img src="{{ asset('imagenes/'. $imagen->path) }}">
                    </div>
                </div>
            </div>
        </div>

    @endforeach

@endsection