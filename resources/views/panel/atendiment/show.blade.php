@extends('adminlte::page')

@section('title', 'Página Histórico')

@section('content_header')
<h1>Histórico de Atendimento: <strong>{{\Carbon\Carbon::parse($atendiment->date)->format('d/m/Y')}}</strong></h1>
@stop

@section('content')

    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Dashboard</a></li>
        <li><a href="">Histórico Atendimento</a></li>
    </ol>

    
    <div class="content-din">

            @include('panel.includes.alerts')
        
            <ul>
                <li>Data: <strong>{{\Carbon\Carbon::parse($atendiment->date)->format('d/m/Y')}}</strong></li>
                <li>Animal: <strong>{{$atendiment->animal->name}}</strong></li>
                <li>Veterinário: <strong>{{$atendiment->vetenary_id}}</strong></li>
                <li>Anotações: <strong>{{$atendiment->note}}</strong></li>
            </ul>   
            
                {!! Form::open(['route'=> ['atendiment.destroy', $atendiment->id], 'class' => 'form form-search form-ds', 'method' => 'DELETE']) !!}
        
                <div class="form-group">
                    <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Deletar</button>
                </div>
                {!! Form::close() !!}
        
        </div><!--Content Dinâmico-->

@stop
