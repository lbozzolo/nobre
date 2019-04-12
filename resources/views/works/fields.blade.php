<div class="form-group col-lg-4">
    {!! Form::label('title', 'Título:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-lg-4">
    {!! Form::label('year', 'Seleccione un año') !!}
    {!! Form::text('year', null, ['class' => 'form-control datepicker', 'style' => 'height: 35px', 'autocomplete' => 'off']) !!}
</div>
{{--<div class="form-group col-lg-4">--}}
    {{--{!! Form::label('year', 'Seleccione un año') !!}--}}
    {{--{!! Form::select('year', $years, ( isset($item) && $item->year)? $item->year : null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<div class="form-group col-lg-4">
    {!! Form::label('active', 'Estado:') !!}
    {!! Form::select('active', ['0' => 'Inactivo', '1' => 'Activo'], (isset($item))? $item->active : null, ['class' => 'form-control']) !!}
</div>

{{--<div class="form-group col-lg-6">--}}
    {{--{!! Form::label('type', 'Tipo:') !!}--}}
    {{--{!! Form::select('type', ['past' => 'Pasado', 'present' => 'Presente'], (isset($work))? $work->type : null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Description Field -->
<div class="form-group col-lg-12">
    {!! Form::label('body', 'Descripción:') !!}
    <div>
        {{--{!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'summernote', 'rows' => '10']) !!}--}}
        {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '5']) !!}
    </div>
</div>

{{--<div class="form-group col-lg-9">--}}
    {{--{!! Form::label('categories', 'Categorías') !!}--}}
    {{--@if(isset($noticia))--}}
    {{--<select name="categories[]" class="select2 form-control" placeholder="" multiple style="width: 100%">--}}
        {{--@foreach ($categories as $key => $value)--}}
            {{--<option value="{{ $key }}" @if ($noticia->categories->contains($key)) selected @endif>--}}
                {{--{{ $value }}--}}
            {{--</option>--}}
        {{--@endforeach--}}
    {{--</select>--}}
    {{--@else--}}
        {{--{!! Form::select('categories[]', $categories, null, ['class' => 'form-control select2', 'placeholder' => '']) !!}--}}
    {{--@endif--}}
{{--</div>--}}


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('works.index') !!}" class="btn btn-default">Cancelar</a>
</div>
