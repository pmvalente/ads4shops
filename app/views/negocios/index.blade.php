@extends('layouts.master')

@section('content')
    <div class="list generic">
        <header>
            {{ link_to('negocio/create' , 'Novo', array('class' => 'btn btn_new')) }}
            <h4>Negócios</h4>
        </header>
        {{--form de procura--}}
        {{ Form::open(array('url' => 'negocio', 'method' => 'get')) }}
            {{ Form::text('nome', $nome, array('placeholder' => 'Nome')) }}
            {{ Form::button('Pesquisar', array('type' => 'submit', 'class' => 'btn btn_search')) }}
        {{ Form::close() }}
        @if($negocios->getItems())
            <table>
                <thead>
                    <tr>
                        <th><a href="'{{ URL::to('negocio?sort=nome' . $str) }}">Nome</a></th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($negocios as $negocio)
                        <tr>
                            <td>{{ e($negocio->nome) }}</td>
                            <td class="action">{{ link_to('negocio/' . $negocio->id . '/edit', '', array('class' => 'ico ico_edit', 'title' => 'Editar' )) }}</td>
                            <td class="action"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="no_information">{{ Util::message('MSG011') }}</p>
        @endif
    </div>

@stop