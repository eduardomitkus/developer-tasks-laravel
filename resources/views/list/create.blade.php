@extends('layouts.structure-dafault')
@section('content')
@section('title')
Nova Lista de Task
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
<form method="POST" action="{{ route('list.store') }}" class="shadow margin-top-3-percent padding-3-percent">
    @csrf
    <input name="developer_id" type="hidden" value="{{ auth()->user()->getId() }}">
    <div class="form-group">
        <label>Título</label>
        <input name="title" type="text" class="form-control form-control-lg" value="{{ old('title') }}">
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <textarea name="description" type="text" class="form-control" rows="3">{{ old('description') }}</textarea>
    </div>
    <div class="form-group">
            <label>Tecnologia</label>
        <select class="form-control" id="exampleFormControlSelect1" name="technology_id">
            @if($technologies->count() > 0)
            <option value="{{ null }}" selected>Selecione a tecnologia da lista</option>
            @foreach ($technologies as $technology)
            <option value="{{ $technology->getId() }}" {{ old('technology_id') == $technology->getName() ? 'selected' : ''  }}>{{ $technology->getName() }}</option>            
            @endforeach
            @else
            <option value="{{ null }}" selected>É necessário inserir uma Tecnologia no sistema</option>
            @endif
        </select>
    </div>
    <button type="submit" class="btn btn-info shadow">Salvar</button>
</form>
<a href="{{ route('list.index') }}"><button class="shadow btn btn-dark margin-top-3-percent" type="button">Voltar</button></a>
@endsection