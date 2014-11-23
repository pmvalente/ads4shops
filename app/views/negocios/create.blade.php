@extends('layouts.master')

@section('content')
    <div class="form generic">
        <header>
            {{ link_to('negocio' , 'Voltar', array('class' => 'btn btn_back')) }}
            <h4>Adicionar Negócio</h4>
        </header>
        {{ Form::open(array('url' => 'negocio')) }}

            {{ Form::label('nome', '*Nome') }}
            {{ Form::text('nome', Input::old('nome')) }}
            {{ $errors->first('nome', '<span class="error">:message</span>') }}

            {{ Form::submit('Guardar') }}
        {{ Form::close() }}

    </div>
@stop