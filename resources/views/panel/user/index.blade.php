@extends('adminlte::page')

@section('title', 'Página Usuário')

@section('content_header')
    <h1>Usuários</h1>
@stop

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li><a href="">Usuário</a></li>
    </ol>


<div class="content-din bg-white">

        <div class="form-search">
                {!! Form::open(['route' => 'user.search', 'class' => 'form form-inline']) !!}
                {!! Form::text('key_search', null, ['placeholder' => 'O que deseja encontrar?', 'class' => 'form-control']) !!}
    
                <button class="btn btn-search">Pesquisar</button>
            {!! Form::close() !!}
        </div>

        <div class="class-btn-insert">
            <a href="{{route('user.create')}}" class="btn btn-primary" style="margin:10px 0;">
                <span class="glyphicon glyphicon-plus"></span>
                Cadastrar
            </a>
        </div>

        <div class="messages">
                @include('panel.includes.alerts')
        </div>

    <table class="table table-striped">
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th width="200">Ações</th>
        </tr>

        @forelse($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                
                <td>
                    <a href="{{route('user.edit', $user->id)}}" class="edit">Editar</a>
                    <a href="{{route('user.show', $user->id)}}" class="delete">Deletar</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="200">Nenhum item cadastrado!</td>
            </tr>
        @endforelse
    </table>

    @if(isset($dataForm))
        {!! $users->appends($dataForm)->links() !!}
    @else
        {!! $users->links() !!}
    @endif

</div><!--Content Dinâmico-->


@stop