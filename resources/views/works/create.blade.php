@extends('layouts.app')

@section('css')
    <style type="text/css">
        body .popover{display:none !important; }
    </style>
@endsection

@section('content')

    <div class="card col-lg-12">
        <div class="card-body">

            <h1>Trabajo / <span class="text-warning">Agregar</span></h1>
            <div class="row">
                <div class="card-body">
                    {!! Form::open(['route' => 'works.store']) !!}

                    <div class="row">
                    @include('works.fields')
                    </div>

                    {!! Form::close() !!}
                </div>

            </div>

        </div>
    </div>

@endsection


@section('js')

    <script>

        $('.select2').select2({
           multiple: true
        });

        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
            });
        });

        $('.datepicker').datepicker({
            format: "yyyy",
            weekStart: 1,
            orientation: "top auto",
            keyboardNavigation: false,
            viewMode: "years",
            minViewMode: "years",
            startDate: '2010'
        });

    </script>

@endsection