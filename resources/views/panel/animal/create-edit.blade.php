@extends('adminlte::page')

@section('title', 'Página Animal')

@section('content_header')
    <h1>Gestão de Animais</h1>
@stop

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li><a href="{{route('animal.index')}}">Animal</a></li>
        <li><a href="">Gestão de Animal</a></li>
    </ol>

<div class="content-din bg-white">

    @include('panel.includes.errors')
        
    <div class="content-din">

        @if(isset($animal))
            {!! Form::model($animal, ['route' => ['animal.update', $animal->id], 'class' => 'form form-search form-ds', 'method' => 'PUT', 'files' => true]) !!}
        @else
            {!! Form::open(['route'=> 'animal.store', 'class' => 'form form-search form-ds', 'files' => true]) !!}
        @endif

        <div class="form-group">
            <label for="name">Nome:</label>
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
        </div>
        <div class="form-group">
            <label for="image">Imagem:</label>
            {!! Form::file('image', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <label for="age">Idade:</label>
            {!! Form::number('age', null, ['class' => 'form-control', 'placeholder' => 'Idade:']) !!}
        </div>
        <div class="form-group">
            <label for="specie">Espécie:</label>
            {!! Form::text('specie', null, ['class' => 'form-control', 'placeholder' => 'Espécie:']) !!}
        </div>
        <div class="form-group">
            <label for="blood">Raça:</label>
            {!! Form::text('blood', null, ['class' => 'form-control', 'placeholder' => 'Raça:']) !!}
        </div>
        <div class="form-group">
            <label for="note">Anotações:</label>
            {!! Form::textarea('note', null, ['class' => 'form-control', 'placeholder' => 'Anotações:']) !!}
        </div>

        <div class="form-group">
            <button class="btn btn-search">Enviar</button>
        </div>
            
        {!! Form::close() !!}

        
    </div>

</div><!--Content Dinâmico-->
@stop