@extends('adminlte::page')

@section('title', 'Página Veterinário')

@section('content_header')
    <h1>Veterinário</h1>
@stop

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li><a href="">Veterinário</a></li>
    </ol>


<div class="content-din bg-white">

        <div class="form-search">
                {!! Form::open(['route' => 'veterinary.search', 'class' => 'form form-inline']) !!}
                {!! Form::text('key_search', null, ['placeholder' => 'O que deseja encontrar?', 'class' => 'form-control']) !!}
    
                <button class="btn btn-search">Pesquisar</button>
            {!! Form::close() !!}
        </div>

        <div class="class-btn-insert">
            <a href="{{route('veterinary.create')}}" class="btn btn-primary" style="margin:10px 0;">
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
            <th>CRV</th>
            <th width="200">Ações</th>
        </tr>

        @forelse($veterinarys as $veterinary)
            <tr>
                <td>{{$veterinary->name}}</td>
                <td>{{$veterinary->phone}}</td>
                <td>{{$veterinary->crv}}</td>
                
                <td>
                    <a href="{{route('veterinary.edit', $veterinary->id)}}" class="edit">Editar</a>
                    <a href="{{route('veterinary.show', $veterinary->id)}}" class="delete">Deletar</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="200">Nenhum item cadastrado!</td>
            </tr>
        @endforelse
    </table>

    @if(isset($dataForm))
        {!! $veterinarys->appends($dataForm)->links() !!}
    @else
        {!! $veterinarys->links() !!}
    @endif

</div><!--Content Dinâmico-->


@stop