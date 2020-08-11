@extends('adminlte::page')

@section('title', 'Página Doações')

@section('content_header')
    <h1>Gestão de Doações</h1>
@stop

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li><a href="{{route('donation.index')}}">Doações</a></li>
        <li><a href="">Gestão de Doações</a></li>
    </ol>

<div class="content-din bg-white">

    @include('panel.includes.errors')
        
    <div class="content-din">

        @if(isset($donation))
            {!! Form::model($donation, ['route' => ['donation.update', $donation->id], 'class' => 'form form-search form-ds', 'method' => 'PUT']) !!}
        @else
            {!! Form::open(['route'=> 'donation.store', 'class' => 'form form-search form-ds']) !!}
        @endif

        <div class="form-group">
            <label for="name">Nome:</label>
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
        </div>
        <div class="form-group">
            <label for="rg">RG:</label>
            {!! Form::text('rg', null, ['class' => 'form-control', 'placeholder' => 'RG:']) !!}
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email:']) !!}
        </div>
        
        <div class="form-group">
            <label for="age">Telefone:</label>
            {!! Form::text('fone', null, ['class' => 'form-control', 'placeholder' => 'Telefone:']) !!}
        </div>
        <div class="form-group">
            <label for="cell_phone">Celular:</label>
            {!! Form::text('cell_phone', null, ['class' => 'form-control', 'placeholder' => 'Celular:']) !!}
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
            <label for="type">Tipo:</label>
            {!! Form::text('type', null, ['class' => 'form-control', 'placeholder' => 'Tipo:']) !!}
        </div>
        <div class="form-group">
            <label for="qty">Quantidade:</label>
            {!! Form::number('qty', null, ['class' => 'form-control', 'placeholder' => 'Quantidade:']) !!}
        </div>
        

        <div class="form-group">
            <button class="btn btn-search">Enviar</button>
        </div>
            
        {!! Form::close() !!}

        
    </div>

</div><!--Content Dinâmico-->
@stop
    
  