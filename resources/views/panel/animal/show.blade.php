@extends('adminlte::page')

@section('title', 'Página Animal')

@section('content_header')
<h1>Animal: <strong> {{$animal->name}}</strong></h1>
@stop

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li><a href="{{route('animal.index')}}">Animal</a></li>
        
    </ol>

    

    <div class="content-din">

            @include('panel.includes.alerts')
        
            <ul>
                <li>Nome: <strong>{{$animal->name}}</strong></li>
                <li>Idade: <strong>{{$animal->age}}</strong></li>
                <li>Espécie: <strong>{{$animal->specie}}</strong></li>
                <li>Raça: <strong>{{$animal->blood}}</strong></li>
                <li>Observação: <strong>{{$animal->note}}</strong></li>
            </ul>   
            
                {!! Form::open(['route'=> ['animal.destroy', $animal->id], 'class' => 'form form-search form-ds', 'method' => 'DELETE']) !!}
        
                <div class="form-group">
                    <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Deletar</button>
                </div>
                {!! Form::close() !!}
        
        </div><!--Content Dinâmico-->

@stop
