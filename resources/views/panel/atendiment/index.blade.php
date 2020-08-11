@extends('adminlte::page')

@section('title', 'Página Histórico')

@section('content_header')
    <h1>Histórico de Atendimento</h1>
@stop

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li><a href="">Histórico Atendimento</a></li>
    </ol>

<div class="content-din bg-white">

        <div class="form-search">
                {!! Form::open(['route' => 'atendiment.search', 'class' => 'form form-inline']) !!}
                {!! Form::text('key_search', null, ['placeholder' => 'Digite o ID?', 'class' => 'form-control']) !!}
    
                <button class="btn btn-search">Pesquisar</button>
            {!! Form::close() !!}
        </div>

        <div class="class-btn-insert">
            <a href="{{route('atendiment.create')}}" class="btn btn-primary" style="margin:10px 0;">
                <span class="glyphicon glyphicon-plus"></span>
                Cadastrar
            </a>
        </div>

        <div class="messages">
                @include('panel.includes.alerts')
        </div>

    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Animal</th>
            <th>Veterinário</th>
            <th>Data</th>
            <th width="200">Ações</th>
        </tr>

        @forelse($atendiments as $atendiment)
            <tr>
                <td>{{$atendiment->id}}</td>
                <td>{{$atendiment->animal->name}}</td>
                <td>{{$atendiment->veterinary->name}}</td>
                <td>{{\Carbon\Carbon::parse($atendiment->date)->format('d/m/Y') }}</td>
                <td>
                    <a href="{{route('atendiment.edit', $atendiment->id)}}" class="edit">Editar</a>
                    <a href="{{route('atendiment.show', $atendiment->id)}}" class="delete">Deletar</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="200">Nenhum item cadastrado!</td>
            </tr>
        @endforelse
    </table>

    @if(isset($dataForm))
        {!! $atendiments->appends($dataForm)->links() !!}
    @else
        {!! $atendiments->links() !!}
    @endif

</div><!--Content Dinâmico-->

@stop