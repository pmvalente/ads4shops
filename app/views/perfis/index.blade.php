@extends('layouts.master')

@section('content')
    <div class="list generic">
        <header>
            {{ link_to('perfil/create' , 'Novo', array('class' => 'btn btn_new')) }}
            <h4>Perfis</h4>
        </header>
        {{--form de procura--}}
        {{ Form::open(array('url' => 'perfil', 'method' => 'get')) }}
            {{ Form::text('nome', $nome, array('placeholder' => 'Nome')) }}
            {{ Form::button('Pesquisar', array('type' => 'submit', 'class' => 'btn btn_search')) }}
        {{ Form::close() }}
        @if($perfis->getItems())
            <table>
                <thead>
                    <tr>
                        <th><a href=" {{ URL::to('perfil?sort=nome' . $str) }} ">Nome</a></th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($perfis as $perfil)
                        <tr>
                            <td>{{ e($perfil->nome) }}</td>
                            <td class="action">{{ link_to('perfil/' . $perfil->id . '/edit', '', array('class' => 'ico ico_edit', 'title' => 'Editar' )) }}</td>
                            <td class="action">
                                {{ Form::open(array('url' => 'perfil/' . $perfil->id, 'method' => 'delete', 'data-confirm' => 'Deseja realmente apagar o registo selecionado?')) }}
                                    {{ Form::button('', array('type' => 'submit', 'class' => 'ico ico_delete', 'title' => 'Apagar')) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div id="data_paginate">
                {{ $pagination }}
                <p>Exibindo de {{ $perfis->getFrom() }} até {{ $perfis->getTo() }} de {{ $perfis->getTotal() }} registos.</p>
            </div>
        @else
            <p class="no_information">{{ Util::message('MSG011') }}</p>
        @endif
    </div>

@stop