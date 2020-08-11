@extends('adminlte::page')

@section('title', 'Página Usuário')

@section('content_header')
<h1>Usuário: <strong> {{$user->name}}</strong></h1>
@stop

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li><a href="">Usuários</a></li>
    </ol>

    
    <div class="content-din">

            @include('panel.includes.alerts')
        
            <ul>
                <li>Nome: <strong>{{$user->name}}</strong></li>
                <li>Email: <strong>{{$user->email}}</strong></li>
            </ul>   
            
                {!! Form::open(['route'=> ['user.destroy', $user->id], 'class' => 'form form-search form-ds', 'method' => 'DELETE']) !!}
        
                <div class="form-group">
                    <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Deletar</button>
                </div>
                {!! Form::close() !!}
        
        </div><!--Content Dinâmico-->

@stop
