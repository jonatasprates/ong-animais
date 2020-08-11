@extends('adminlte::page')

@section('title', 'Página Doação')

@section('content_header')
<h1>Doador: <strong> {{$donation->name}}</strong></h1>
@stop

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li><a href="">Doações</a></li>
    </ol>

    
    <div class="content-din">

            @include('panel.includes.alerts')
        
            <ul>
                <li>Nome: <strong>{{$donation->name}}</strong></li>
                <li>RG: <strong>{{$donation->age}}</strong></li>
                <li>Email: <strong>{{$donation->specie}}</strong></li>
                <li>Telefone: <strong>{{$donation->fone}}</strong></li>
                <li>Celular: <strong>{{$donation->cell_phone}}</strong></li>
                <li>Endereço: <strong>{{$donation->address}}</strong></li>
                <li>CEP: <strong>{{$donation->zip_code}}</strong></li>
                <li>Estado: <strong>{{$donation->state}}</strong></li>
                <li>Cidade: <strong>{{$donation->city}}</strong></li>
                <li>Tipo de Doação: <strong>{{$donation->type}}</strong></li>
                <li>Quantidade de Doação: <strong>{{$donation->qty}}</strong></li>
            </ul>   
            
                {!! Form::open(['route'=> ['donation.destroy', $donation->id], 'class' => 'form form-search form-ds', 'method' => 'DELETE']) !!}
        
                <div class="form-group">
                    <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Deletar</button>
                </div>
                {!! Form::close() !!}
        
        </div><!--Content Dinâmico-->

@stop
