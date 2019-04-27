@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            <h1>Social & Media / <span class="text-warning">Agregar</span></h1>
        </div>
    </div>

    <div class="card mt-2">
        <div class="card-body">

            <div class="row">
                <div class="card-body">
                @include('medias.partials.create-past')
                </div>
            </div>

        </div>
    </div>

@endsection

@section('js')

    <script src="{{ asset('croppie/croppie.js') }}"></script>
    <script src="{{ asset('exif-js/exif.js') }}"></script>
    <script src="{{ asset('js/croppie-file-servicio.js') }}"></script>

@endsection
