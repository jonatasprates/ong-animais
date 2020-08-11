@extends('adminlte::page')

@section('title', 'Página Veterinário')

@section('content_header')
<h1>Veterinário: <strong> {{$veterinary->name}}</strong></h1>
@stop

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li><a href="">Veterinário</a></li>
    </ol>

    
    <div class="content-din">

            @include('panel.includes.alerts')
        
            <ul>
                <li>Nome: <strong>{{$veterinary->name}}</strong></li>
                <li>Telefone: <strong>{{$veterinary->phone}}</strong></li>
                <li>CRV: <strong>{{$veterinary->crv}}</strong></li>
                <li>Endereço: <strong>{{$veterinary->address}}</strong></li>
                <li>CEP: <strong>{{$veterinary->zip_code}}</strong></li>
                <li>Estado: <strong>{{$veterinary->state}}</strong></li>
                <li>Cidade: <strong>{{$veterinary->city}}</strong></li>
                
            </ul>   
            
                {!! Form::open(['route'=> ['veterinary.destroy', $veterinary->id], 'class' => 'form form-search form-ds', 'method' => 'DELETE']) !!}
        
                <div class="form-group">
                    <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Deletar</button>
                </div>
                {!! Form::close() !!}
        
        </div><!--Content Dinâmico-->

@stop
