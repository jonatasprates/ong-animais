@extends('adminlte::page')

@section('title', 'Página Usuários')

@section('content_header')
    <h1>Gestão de Usuários</h1>
@stop

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li><a href="{{route('user.index')}}">Usuário</a></li>
        <li><a href="">Gestão de Usuários</a></li>
    </ol>

<div class="content-din bg-white">

    @include('panel.includes.errors')
        
    <div class="content-din">

        @if(isset($user))
            {!! Form::model($user, ['route' => ['user.update', $user->id], 'class' => 'form form-search form-ds', 'method' => 'PUT']) !!}
        @else
            {!! Form::open(['route'=> 'user.store', 'class' => 'form form-search form-ds']) !!}
        @endif

        <div class="form-group">
            <label for="name">Nome:</label>
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
        </div>
        
        <div class="form-group">
            <label for="email">E-mail:</label>
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email:']) !!}
        </div>
        
        <div class="form-group">
            <label for="password">Senha:</label>
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha:']) !!}
        </div>
        
        <div class="form-group">
            <label for="password_confirmation">Confirmar Senha:</label>
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmar Senha:']) !!}
        </div>
        

        <div class="form-group">
            <button class="btn btn-search">Enviar</button>
        </div>
            
        {!! Form::close() !!}

        
    </div>

</div><!--Content Dinâmico-->
@stop
    
  