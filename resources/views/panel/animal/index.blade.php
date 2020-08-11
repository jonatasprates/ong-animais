@extends('adminlte::page')

@section('title', 'Página Animal')

@section('content_header')
    <h1>Animal</h1>
@stop

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li><a href="">Animal</a></li>
    </ol>

    

<div class="content-din bg-white">

        <div class="form-search">
                {!! Form::open(['route' => 'animal.search', 'class' => 'form form-inline']) !!}
                {!! Form::text('key_search', null, ['placeholder' => 'O que deseja encontrar?', 'class' => 'form-control']) !!}
    
                <button class="btn btn-search">Pesquisar</button>
            {!! Form::close() !!}
        </div>

        <div class="class-btn-insert">
            <a href="{{route('animal.create')}}" class="btn btn-primary" style="margin:10px 0;">
                <span class="glyphicon glyphicon-plus"></span>
                Cadastrar
            </a>
        </div>

        <div class="messages">
                @include('panel.includes.alerts')
        </div>

    <table class="table table-striped">
        <tr>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Espécie</th>
            <th>Raça</th>
            
            <th width="200">Ações</th>
        </tr>

        @forelse($animals as $animal)
            <tr>
                <td>
                    @if($animal->image)
                        <img src="{{url("storage/animais/{$animal->image}")}}" alt="{{$animal->id}}" style="max-width: 60px;">
                    @else
                    <img src="{{url('assets/panel/imgs/no-image.png')}}" alt="Sem Imagem" style="max-width: 60px;">
                    @endif
                </td>
                <td>{{$animal->name}}</td>
                <td>{{$animal->specie}}</td>
                <td>{{$animal->blood}}</td>
                
                <td>
                    <a href="{{route('animal.edit', $animal->id)}}" class="edit">Editar</a>
                    <a href="{{route('animal.show', $animal->id)}}" class="delete">Deletar</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="200">Nenhum item cadastrado!</td>
            </tr>
        @endforelse
    </table>

    @if(isset($dataForm))
        {!! $animals->appends($dataForm)->links() !!}
    @else
        {!! $animals->links() !!}
    @endif

</div><!--Content Dinâmico-->


@stop