@extends('web.layout')

@section('css')

    <style type="text/css">

        @media (max-width: 600px) {
            /* Styles for screen with max width of 600px */
            header {
                height: auto;
            }
            .content-title {
                margin: 10px 0px;
                font-size: 45px;
                text-align: center;
            }
        }
        @media (max-width: 320px) {
            /* Styles for screen with max width of 320px */
            header {
                height: auto;
            }
            .content-title {
                margin: 10px 0px;
                font-size: 25px;
            }
        }

        .boton {
            border: 2px solid lightgrey;
            border-radius: 0px;
            color: gray;
            font-family: montserrat;
            font-size: 12px;
            font-weight: bold;
            line-height: 1;
            padding: 10px;
            margin-bottom: 3px;
            text-transform: uppercase;
        }

    </style>

@endsection

@section('content')

    @include('web.partials.header')

    @if($slider)
        @include('web.partials.sliders')
    @endif

    <!--ABOUT START-->
    <div id="marketing" class="content clearfix">

        <div class="container">
            <div class="top-content clearfix">
                <i class="fa fa-heart-o content-icon"></i>
                <h3 class="content-title">MARKETING & MANAGEMENT</h3>

                <p class="sub-title">Brindamos consultoría privada para empresas y personas físicas. Soluciones completas de business intelligence, marketing estratégico y operativo, publicidad y promoción, transformación digital y community manager, personal branding, coaching y asesoría de imagen mediante técnicas de neuromarketing. </p>
                <p class="sub-title">Las neurociencias aplicadas constituyen la llave maestra para la innovación en materia de liderazgo, conducción y gestión de organizaciones y empresas. </p>
                <p class="sub-title">Elaboramos planes de negocios y realizamos toda la comunicación institucional, desde la estrategia / idea hasta la implementación final. Combinamos funcionalidad operativa, eficacia técnica, refinamiento estético y originalidad de acciones y campañas. </p>
                <p class="sub-title">Contamos con profesionales en diversas áreas para brindarle calidad en el servicio, coherencia y seriedad al momento que su empresa lo necesite. </p>

            </div><!--/.top-content-->
        </div><!--/.container-->

        <div id="press" class="content clearfix">

            <div class="container">
                <div class="top-content clearfix">
                    <i class="fa fa-heart-o content-icon"></i>
                    <h3 class="content-title">PRESS & COMUNICATION</h3>

                    <p class="sub-title">Ofrecemos todos los servicios de una agencia de comunicación y organización de eventos. Desde la planificación integral, implementación de estrategias y su posterior ajuste. Canalizamos de la manera más adecuada la actualidad de su empresa a los medios de comunicación más afines.</p>
                    <p class="sub-title">Para mejorar su imagen social y corporativa, contamos con una base de datos y servicios de apoyo a medida, fortaleciendo el área de prensa  y comunicación.  </p>
                    <p class="sub-title">Somos especialistas en la organización de eventos aplicando conceptos de marketing & management.</p>

                </div><!--/.top-content-->
            </div><!--/.container-->

        </div><!--/about-->
        <!--/gallery about end-->
    </div><!--/about-->
    <!--ABOUT END-->

    <!--WORKS START-->
    <div id="social" class="content clearfix">
        <div class="container">
            <div class="top-content clearfix">
                <i class="fa fa-newspaper-o content-icon"></i>
                <h3 class="content-title">SOCIAL & MEDIA</h3>

                <p class="sub-title">Producimos contenidos multiplataforma tanto para video como para fotografía, pudiendo tener flexibilidad a la hora de tratar con las necesidades del cliente.</p>
                <p class="sub-title">Contamos con las habilidades y tecnologías de punta para grandes producciones,  campañas institucionales hasta para redes sociales.</p>
                <p class="sub-title">vNos especializamos en la planificación, desarrollo e implementación de estrategias de marketing digital orientadas a segmentos de públicos definidos.</p>
                <p class="sub-title">Aplicamos las prácticas recomendadas para cada canal para asegurar altos niveles de alcance, lectura y engagement con el usuario final.</p>

            </div><!--/.top-content-->

            <div class="text-center">
                <a class="boton"  href="images/future.jpg" data-rel="prettyPhoto">FUTURE</a>
                <a class="boton" href="{{ route('pictures.present') }}" target="_blank">PRESENT</a>
                <a class="boton" href="{{ route('pictures.past') }}" target="_blank">PAST</a>
            </div>

            {{--<ul class="port-filter clearboth clearfix">--}}
                {{--<li><a data-filter=".future" href="#">FUTURE</a></li>--}}
                {{--<li><a data-filter=".present" href="{{ route('pictures.present') }}">PRESENT</a></li>--}}
                {{--<li><a href="{{ route('pictures.past') }}">PAST</a></li>--}}
            {{--</ul>--}}
        </div><!--/container-->


        <div id="worksajax"><!--work ajax anchor--></div>
        <div class="worksajax clearboth clearfix"></div><!--portfolio ajax content here-->
    </div><!--/works-->
    <!--WORKS END-->


    <!--TALENTS START-->
    <div id="talents" class="content clearfix">

        <div class="container">
            <div class="top-content clearfix">
                <i class="fa fa-heart-o content-icon"></i>
                <h3 class="content-title">TALENTS & FRIENDS</h3>

                <p class="sub-title">Nobre Management cuenta con un equipo de celebrities y profesionales como modelos, promotores, cantantes, actores, djs, entre otros.</p>
                <p class="sub-title">Nuestro staff se caracteriza por su profesionalidad y frescura a la hora de desempeñar su tarea. Cuenta con una visión global, avant-garde y cosmopolita que nos ha permitido diferenciarnos de las agencias tradicionales.</p>
                <p class="sub-title">El objetivo es promover un selecto grupo conocedores del mundo de la moda que con su talento estén a la altura de las más exigentes firmas del mercado mundial.</p>

                <i class="fa fa-edit content-icon"></i>
                <h3 class="content-title">WORKS</h3>
                <p class="sub-title">Te mostramos los trabajos de algunos de nuestros talentos.</p>
                <div class="text-center">
                    <a class="boton" href="{{ route('works') }}">Ver trabajos</a>
                </div>
            </div><!--/.top-content-->
        </div><!--/.container-->

    </div>



    <div id="contact" class="content clearfix">
        <div class="container">
            <div class="top-content clearfix">
                <i class="fa fa-hand-peace-o content-icon"></i>
                <h3 class="content-title">CONTACT & NETWORKS</h3>

                <p class="sub-title">Para más información contactenos a los mails y teléfonos brindados. Recordar enviar cv y book.</p>
            </div><!--/.top-content-->
        </div><!--/.container-->
        <!-- <div id="map_canvas" class="map_canvas"></div> -->

        <!--MAP MARKER CONTENT-->
        <div class="hidden map-content">
            <div class="box-map">
                <img src="{{ asset('template-web/images/maps.jpg') }}" alt="">
                <h3>NOBRE MANAGEMENT</h3>
                <p><b>Teléfono:</b> +54 11 55 05 49 21 </p>
                <p><b>Email:</b> info@nobremanagement.com.ar</p>
            </div>
        </div>
        <!--MAP MARKER CONTENT END-->


        <div class="container contact-list">
            <div class="row bottom-content">

                <div class="col-md-4">
                    <h3 class="small-title"><i class="fa fa-building-o"></i>  NOBRE MANAGEMENT</h3>
                    <p>MATIAS DAVID NOBRE <br>R. M. 577/96</p>
                    <div class="spacing20"></div>


                    <h3 class="small-title"><i class="fa fa-phone"></i> Teléfono</h3>
                    <p>+54 11 55 05 49 21 </p>
                    <div class="spacing20"></div>

                    <h3 class="small-title"><i class="fa fa-envelope"></i> Email</h3>
                    <p><a href="#">info@nobremanagement.com.ar</a></p>
                    <div class="spacing20"></div>
                </div><!--/.col-md-4-->



                <div id="contact-form" class="col-md-8 clearfix">


                    <div id="form-wrapper">
                        <div id="form-inner">
                            <div id="ErrResults">
                                @include('vendor.flash.message')
                            </div>
                            <div id="MainContent">

                            {!! Form::open(['url' => route('send.data.applicant'), 'method' => 'post', 'id' => 'MyContactForm']) !!}

                                <div class="row">

                                    <div class="form-group col-lg-12">
                                        {!! Form::text('name', null, ['placeholder' => 'Tu nombre...']) !!}
                                    </div>

                                    <div class="form-group col-lg-12">
                                        {!! Form::text('lastname', null, ['placeholder' => 'Tu Apellido...']) !!}
                                    </div>

                                    <div class="form-group col-lg-12">
                                        {!! Form::text('email', null, ['placeholder' => 'Tu email...']) !!}
                                    </div>

                                    <div class="form-group col-lg-12">
                                        {!! Form::text('phone', null, ['placeholder' => 'Tu teléfono']) !!}
                                    </div>

                                    <div class="form-group col-lg-12">
                                        {!! Form::label('country', 'País:') !!}
                                        {!! Form::select('country', $countries, null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>

                                    <div class="form-group col-lg-12">
                                        {!! Form::label('province', 'Provincia:') !!}
                                        {!! Form::select('province', $provinces, null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                    </div>

                                    <div class="form-group col-lg-12">
                                        {!! Form::text('position', null, ['placeholder' => 'Puesto...']) !!}
                                    </div>

                                    <div class="form-group col-lg-12">
                                        {!! Form::text('company', null, ['placeholder' => 'Tu empresa...']) !!}
                                    </div>

                                    <div class="form-group col-lg-12">
                                        {!! Form::text('area', null, ['placeholder' => 'Rubro...']) !!}
                                    </div>

                                    <div class="form-group col-lg-12">
                                        {!! Form::label('categories[]', 'Áreas de interés:') !!}
                                        @if(isset($interest_areas))
                                            <select name="categories[]" id="select2" class="form-control" placeholder="Tus áreas de interés..." multiple style="width: 100%">
                                                @foreach ($interest_areas as $key => $value)

                                                    <option value="{{ $key }}" @if (isset($applicant) && $applicant->categories->contains($key)) selected @endif>
                                                        {{ $value }}
                                                    </option>

                                                @endforeach
                                            </select>
                                        @else
                                            {!! Form::select('categories[]', $interest_areas, null, ['class' => 'form-control select2', 'placeholder' => '']) !!}
                                        @endif
                                    </div>

                                    <!-- Body Field -->
                                    <div class="form-group col-lg-12">
                                        {!! Form::label('text', 'Texto:') !!}
                                        {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <!-- Submit Field -->
                                    <div class="form-group col-lg-4">
                                        {!! Form::submit('Enviar datos', ['class' => 'boton']) !!}
                                    </div>

                                </div>

                            {!! Form::close() !!}

                            </div>
                        </div>
                    </div>

                    <div class="spacing40"></div>
                </div><!--/.contact-form-->
            </div><!--/.row-->
        </div><!--/contact-list-->

@endsection

@section('js')

    <script>

        $(function() {
            $('#select2').select2();
        });

    </script>

@endsection