@extends('adminlte::page')

@section('title', 'Página Histórico')

@section('content_header')
    <h1>Gestão de Histórico de Atendimento</h1>
@stop

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li><a href="{{route('atendiment.index')}}">Histórico Atendimento</a></li>
        <li><a href="">Gestão de Histórico Atendimento</a></li>
    </ol>

<div class="content-din bg-white">

    @include('panel.includes.errors')
        
    <div class="content-din">

        @if(isset($atendiment))
            {!! Form::model($atendiment, ['route' => ['atendiment.update', $atendiment->id], 'class' => 'form form-search form-ds', 'method' => 'PUT', 'files' => true]) !!}
        @else
            {!! Form::open(['route'=> 'atendiment.store', 'class' => 'form form-search form-ds', 'files' => true]) !!}
        @endif

        <div class="form-group">
            <label for="name">Data:</label>
            {!! Form::date('date', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
        </div>
        
        <div class="form-group">
            <label for="animal_id">Animal</label>
            {!! Form::select('animal_id', $animals, null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            <label for="vetenary_id">Veterinário</label>
            {!! Form::select('vetenary_id', $veterinays, null, ['class' => 'form-control']) !!}
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