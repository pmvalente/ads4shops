@extends('layouts.master')

@section('content')
    <div class="form generic">
        <header>
            {{ link_to('utilizador' , 'Voltar', array('class' => 'btn btn_back')) }}
            <h4>Adicionar Utilizador</h4>
        </header>
        {{ Form::open(array('url' => 'utilizador')) }}

            {{ Form::label('nome', '*Nome') }}
            {{ Form::text('nome', Input::old('nome')) }}
            {{ $errors->first('nome', '<span class="error">:message</span>') }}

            {{ Form::label('negocio_id', '*Negócio') }}
            {{ Form::select('negocio_id', Negocio::options(), Input::old('negocio_id'), array('class' => 'select')) }}
            {{ $errors->first('negocio_id', '<span class="error">:message</span>') }}

            {{ Form::label('username', '*Username') }}
            {{ Form::text('username', Input::old('username')) }}
            {{ $errors->first('username', '<span class="error">:message</span>') }}

            {{ Form::label('password', '*Password') }}
            {{ Form::password('password', Input::old('password')) }}
            {{ $errors->first('password', '<span class="error">:message</span>') }}

            {{ Form::label('ativo', '*Ativo') }}
            {{ Form::checkbox('ativo', Input::old('ativo')) }}
            {{ $errors->first('ativo', '<span class="error">:message</span>') }}

            {{ Form::label('perfil_id', '*Perfil') }}
            {{ Form::text('perfil_id', Input::old('perfil_id')) }}
            {{ $errors->first('perfil_id', '<span class="error">:message</span>') }}

            {{ Form::submit('Guardar') }}
        {{ Form::close() }}

    </div>
@stop