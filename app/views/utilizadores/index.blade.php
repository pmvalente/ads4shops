@extends('layouts.master')

@section('content')
    <div class="list generic">
        <header>
            {{ link_to('utilizador/create' , 'Novo', array('class' => 'btn btn_new')) }}
            <h4>Utilizadores</h4>
        </header>
        {{--form de procura--}}
        {{ Form::open(array('url' => 'utilizador', 'method' => 'get')) }}
            {{ Form::text('nome', $nome, array('placeholder' => 'Nome')) }}
            {{ Form::text('username', $nome, array('placeholder' => 'Username')) }}
            {{ Form::text('email', $nome, array('placeholder' => 'Email')) }}
            {{ Form::text('ativo', $nome, array('placeholder' => 'Ativo')) }}



            {{ Form::button('Pesquisar', array('type' => 'submit', 'class' => 'btn btn_search')) }}
        {{ Form::close() }}

        @if($utilizadores->getItems())
            <table>
                <thead>
                    <tr>
                        <th><a href=" {{ URL::to('utilizador?sort=nome' . $str) }} ">Nome</a></th>
                        <th><a href=" {{ URL::to('utilizador?sort=username' . $str) }} ">Username</a></th>
                        <th><a href=" {{ URL::to('utilizador?sort=email' . $str) }} ">Email</a></th>
                        <th><a href=" {{ URL::to('utilizador?sort=ativo' . $str) }} ">Ativo</a></th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($utilizadores as $utilizador)
                        <tr>
                            <td>{{ e($utilizador->nome) }}</td>
                            <td>{{ e($utilizador->username) }}</td>
                            <td>{{ e($utilizador->email) }}</td>
                            <td>{{ e($utilizador->ativo) }}</td>
                            <td class="action">{{ link_to('utilizador/' . $utilizador->id . '/edit', '', array('class' => 'ico ico_edit', 'title' => 'Editar' )) }}</td>
                            <td class="action">
                                {{ Form::open(array('url' => 'utilizador/' . $utilizador->id, 'method' => 'delete', 'data-confirm' => 'Deseja realmente apagar o registo selecionado?')) }}
                                    {{ Form::button('', array('type' => 'submit', 'class' => 'ico ico_delete', 'title' => 'Apagar')) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div id="data_paginate">
                {{ $pagination }}
                <p>Exibindo de {{ $utilizadores->getFrom() }} até {{ $utilizadores->getTo() }} de {{ $utilizadores->getTotal() }} registos.</p>
            </div>
        @else
            <p class="no_information">{{ Util::message('MSG011') }}</p>
        @endif
    </div>

@stop