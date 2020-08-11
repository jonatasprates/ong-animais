@extends('adminlte::page')

@section('title', 'Página Doações')

@section('content_header')
    <h1>Doações</h1>
@stop

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li><a href="">Doação</a></li>
    </ol>


<div class="content-din bg-white">

        <div class="form-search">
                {!! Form::open(['route' => 'donation.search', 'class' => 'form form-inline']) !!}
                {!! Form::text('key_search', null, ['placeholder' => 'O que deseja encontrar?', 'class' => 'form-control']) !!}
    
                <button class="btn btn-search">Pesquisar</button>
            {!! Form::close() !!}
        </div>

        <div class="class-btn-insert">
            <a href="{{route('donation.create')}}" class="btn btn-primary" style="margin:10px 0;">
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
            <th>Telefone</th>
            <th>Tipo</th>
            <th>Quantidade</th>
            <th width="200">Ações</th>
        </tr>

        @forelse($donations as $donation)
            <tr>
                <td>{{$donation->name}}</td>
                <td>{{$donation->fone}}</td>
                <td>{{$donation->type}}</td>
                <td>{{$donation->qty}}</td>
                <td>
                    <a href="{{route('donation.edit', $donation->id)}}" class="edit">Editar</a>
                    <a href="{{route('donation.show', $donation->id)}}" class="delete">Deletar</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="200">Nenhum item cadastrado!</td>
            </tr>
        @endforelse
    </table>

    @if(isset($dataForm))
        {!! $donations->appends($dataForm)->links() !!}
    @else
        {!! $donations->links() !!}
    @endif

</div><!--Content Dinâmico-->


@stop