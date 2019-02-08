@extends('layouts.structure-dafault')

@section('content')

@section('title')
    Perfil
@endsection

@if(session()->has('updateSucess'))
    <div class="alert alert-success margin-top-3-percent">
        {{ session()->get('updateSucess') }}
    </div>
@endif

<a href="{{ route('developer.edit') }}"><button class="shadow btn btn-info margin-top-3-percent" type="button">Editar</button></a>
<div class="card bg-light margin-top-3-percent padding-3-percent" role="alert">        
    <p>Nome: {{ auth()->user()->getName() ? auth()->user()->getName() : '-'  }}</p>
    <p>Nick name: {{ auth()->user()->getNickName() ? auth()->user()->getNickName() : '-' }}</p>
    <p>Email: {{ auth()->user()->getEmail() ? auth()->user()->getEmail() : '-' }}</p>
    <p>Data de Aniversário : {{ auth()->user()->getBirthDate() ? auth()->user()->getBirthDate() : '?' }}</p>
  </div>
<a href="{{ route('home') }}"><button class="shadow btn btn-dark margin-top-3-percent" type="button">Voltar</button></a>
  
@endsection