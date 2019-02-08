@extends('layouts.structure-dafault')
@section('content')
@section('title')
Editar lista de Tasks
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
<form method="POST" action="{{ route('list.update', $listTasks->getId()) }}" class="shadow margin-top-3-percent padding-3-percent">
    @csrf
    <input name="_method" type="hidden" value="PUT">
    <input name="developer_id" type="hidden" value="{{ $listTasks->getDeveloperId() }}">
    <div class="form-group">
        <label>Título</label>
        <input name="title" type="text" class="form-control form-control-lg" value="{{ $listTasks->getTitle() }}">
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <textarea name="description" type="text" class="form-control" rows="3">{{ $listTasks->getDescription() }}</textarea>
    </div>
    <div class="form-group">
        <select class="form-control" id="exampleFormControlSelect1" name="technology_id">
            <option selected>Selecione a tecnologia da lista</option>
            @foreach ($technologies as $technology)
            <option
            value="{{ $technology->getId() }}"
            {{ $listTasks->technology()->first()->getName() == $technology->getName() ? 'selected' : ''  }}>
            {{ $technology->getName() }}
            </option>            
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-info shadow">Salvar</button>
</form>
<a href="{{ route('list.index') }}"><button class="shadow btn btn-dark margin-top-3-percent" type="button">Voltar</button></a>
@endsection