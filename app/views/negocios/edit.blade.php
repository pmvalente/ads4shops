@extends('layouts.master')

@section('content')
    <div class="form generic">
        <header>
            {{ link_to('negocio' , 'Voltar', array('class' => 'btn btn_back')) }}
            <h4>Alterar Negócio</h4>
        </header>
        {{ Form::open(array('url' => 'negocio/' . $negocio->id, 'method' => 'put')) }}

            {{ Form::label('nome', '*Nome') }}
            {{ Form::text('nome', Input::old('nome', $negocio->nome)) }}
            {{ $errors->first ('nome', '<span class="error">:message</span>') }}

            {{ Form::submit('Alterar') }}
        {{ Form::close() }}

    </div>
@stop