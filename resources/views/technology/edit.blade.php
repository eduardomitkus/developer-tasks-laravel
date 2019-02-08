@extends('layouts.structure-dafault')
@section('content')
@section('title')
Editar informações da Tecnologia    
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
<form method="POST" action="{{ route('technology.update',$technology->getId()) }}" class="shadow margin-top-3-percent padding-3-percent">
    @csrf
    <input name="_method" type="hidden" value="PUT">
    <div class="form-group">
        <label>Nome</label>
        <input name="name" type="text" class="form-control form-control-lg" value="{{ $technology->getName() }}">
    </div>
    <div class="form-group">
        <div class="form-group">
            <select class="form-control" id="exampleFormControlSelect1" name="platform">
                <option selected>Escolha Plataforma da Tecnologia</option>
                <option {{ $technology->getPlatform() == $platforms::WEB ? 'selected' : '' }} value="{{ $platforms::WEB }}">{{ $platforms::WEB }}</option>
                <option {{ $technology->getPlatform() == $platforms::DESKTOP ? 'selected' : '' }} value="{{ $platforms::DESKTOP }}">{{ $platforms::DESKTOP }}</option>
                <option {{ $technology->getPlatform() == $platforms::MOBILE ? 'selected' : '' }} value="{{ $platforms::MOBILE }}">{{ $platforms::MOBILE }}</option>
                <option {{ $technology->getPlatform() == $platforms::GAMES ? 'selected' : '' }} value="{{ $platforms::GAMES }}">{{ $platforms::GAMES  }}</option>
                <option {{ $technology->getPlatform() == $platforms::MULTIPLATAFORM ? 'selected' : '' }} value="{{ $platforms::MULTIPLATAFORM  }}">{{ $platforms::MULTIPLATAFORM  }}</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-info shadow margin-top-3-percent">Salvar</button>
</form>
<a href="{{ route('technology.index') }}"><button class="shadow btn btn-dark margin-top-3-percent" type="button">Voltar</button></a>
@endsection