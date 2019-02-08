@extends('layouts.structure-dafault')
@section('content')
@section('title')
Adicionar Tecnologia    
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
<form method="POST" action="{{ route('technology.store') }}" class="shadow margin-top-3-percent padding-3-percent">
    @csrf
    <div class="form-group">
        <label>Nome</label>
        <input name="name" type="text" class="form-control form-control-lg" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <div class="form-group">
            <select class="form-control" id="exampleFormControlSelect1" name="platform">
                <option selected>Escolha Plataforma da Tecnologia</option>
                <option {{ old('platform') == $platforms::WEB ? 'selected' : '' }} value="{{ $platforms::WEB }}">{{ $platforms::WEB }}</option>
                <option {{ old('platform') == $platforms::DESKTOP ? 'selected' : '' }} value="{{ $platforms::DESKTOP }}">{{ $platforms::DESKTOP }}</option>
                <option {{ old('platform') == $platforms::MOBILE ? 'selected' : '' }} value="{{ $platforms::MOBILE }}">{{ $platforms::MOBILE }}</option>
                <option {{ old('platform') == $platforms::GAMES ? 'selected' : '' }} value="{{ $platforms::GAMES }}">{{ $platforms::GAMES  }}</option>
                <option {{ old('platform') == $platforms::MULTIPLATAFORM ? 'selected' : '' }} value="{{ $platforms::MULTIPLATAFORM  }}">{{ $platforms::MULTIPLATAFORM  }}</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-info shadow margin-top-3-percent">Salvar</button>
</form>
<a href="{{ route('technology.index') }}"><button class="shadow btn btn-dark margin-top-3-percent" type="button">Voltar</button></a>
@endsection