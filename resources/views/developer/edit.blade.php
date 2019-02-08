@extends('layouts.structure-dafault')
@section('content')
@section('title')
Editar Developer
@endsection
@if ($errors->any())
<div class="alert alert-danger margin-top-3-percent">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{ route('developer.update',$developer->getId()) }}" class="shadow margin-top-3-percent padding-3-percent">
    @csrf
    <input name="_method" type="hidden" value="PUT">
    <div class="form-group">
        <label>Nome</label>
        <input name="name" type="text" class="form-control" value="{{ $developer->getName() }}">
    </div>
    <div class="form-group">
        <label>Nick</label>
        <input name="nick_name" type="text" class="form-control" value="{{ $developer->getNickName() }}">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input name="email" type="email" class="form-control" value="{{ $developer->getEmail() }}">
    </div>
    <div class="form-group">
        <label>Data de aniversário</label>
        <input id="date" name="birth_date" type="date" class="form-control" value="{{ $developer->getBirthDateISO() }}">
    </div>
    <button type="submit" class="btn btn-info shadow">Atualizar</button>
</form>
<a href="{{ route('developer.profile') }}"><button class="shadow btn btn-dark margin-top-3-percent" type="button">Voltar</button></a>
@endsection