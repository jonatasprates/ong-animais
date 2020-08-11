@extends('adminlte::page')

@section('title', 'Página Veterinário')

@section('content_header')
    <h1>Gestão de Veterinários</h1>
@stop

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li><a href="{{route('veterinary.index')}}">Veterinário</a></li>
        <li><a href="">Gestão de Veterinários</a></li>
    </ol>

<div class="content-din bg-white">

    @include('panel.includes.errors')
        
    <div class="content-din">

        @if(isset($veterinary))
            {!! Form::model($veterinary, ['route' => ['veterinary.update', $veterinary->id], 'class' => 'form form-search form-ds', 'method' => 'PUT']) !!}
        @else
            {!! Form::open(['route'=> 'veterinary.store', 'class' => 'form form-search form-ds']) !!}
        @endif

        <div class="form-group">
            <label for="name">Nome:</label>
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
        </div>
        
        <div class="form-group">
            <label for="phone">Telefone:</label>
            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Telefone:']) !!}
        </div>
        
        <div class="form-group">
            <label for="crv">CRV:</label>
            {!! Form::text('crv', null, ['class' => 'form-control', 'placeholder' => 'CRV:']) !!}
        </div>
        
        <div class="form-group">
            <label for="address">Endereço:</label>
            {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Endereço:']) !!}
        </div>
        <div class="form-group">
            <label for="zip_code">CEP:</label>
            {!! Form::text('zip_code', null, ['class' => 'form-control', 'placeholder' => 'CEP:']) !!}
        </div>
        <div class="form-group">
            <label for="state">Estado:</label>
            {!! Form::text('state', null, ['class' => 'form-control', 'placeholder' => 'Estado:']) !!}
        </div>
        <div class="form-group">
            <label for="city">Cidade:</label>
            {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Cidade:']) !!}
        </div>

        <div class="form-group">
            <button class="btn btn-search">Enviar</button>
        </div>
            
        {!! Form::close() !!}

        
    </div>

</div><!--Content Dinâmico-->
@stop
    
  