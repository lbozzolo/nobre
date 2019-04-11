@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">

            <h1>Social & Media</h1>

            {!! Form::open(['url' => route('medias.create'), 'method' => 'post']) !!}

                <div class="form-group">
                    <p>Seleccione un año</p>
                    {!! Form::select('year', $years, (isset($year_selected))? $year_selected : null, ['class' => 'form-control', 'placeholder' => 'Seleccione un año']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
                </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection

