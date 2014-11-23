@extends('layouts.master')

@section('content')
    <div class="form generic">
        <header>
            {{ link_to('perfil' , 'Voltar', array('class' => 'btn btn_back')) }}
            <h4>Alterar Perfil</h4>
        </header>
        {{ Form::open(array('url' => 'perfil/' . $perfil->id, 'method' => 'put')) }}

            {{ Form::label('nome', '*Nome') }}
            {{ Form::text('nome', Input::old('nome', $perfil->nome)) }}
            {{ $errors->first ('nome', '<span class="error">:message</span>') }}

            {{ Form::submit('Alterar') }}
        {{ Form::close() }}

    </div>
@stop