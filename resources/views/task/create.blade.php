@extends('layouts.structure-dafault')
@section('content')
@section('title')
Criar Task
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
<form method="POST" action="{{ route('task.store') }}" class="shadow margin-top-3-percent padding-3-percent">
    @csrf
    <input name="list_task_id" type="hidden" value="{{ $idList }}">
    <div class="form-group">
        <label>Titulo</label>
        <input name="title" type="text" class="form-control form-control-lg" value="{{ old('title') }}">
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <textarea name="description" type="text" class="form-control" rows="3"> {{ old('description') }}</textarea>        
    </div>
    <div class="form-group">
        <select class="form-control" id="exampleFormControlSelect1" name="priority">
            <option selected>Selecione um nível de prioridade</option>
            <option {{ old('priority') == $priorities::LOW ? 'selected' : '' }} value="Baixa">Baixa</option>
            <option {{ old('priority') == $priorities::AVERAGE ? 'selected' : '' }} value="Média">Média</option>
            <option {{ old('priority') == $priorities::HIGH ? 'selected' : '' }} value="Alta">Alta</option>            
        </select>
    </div>
    <div class="alert alert-info">
        <input type="checkbox" name="start"> Iniciar task?<br>
    </div>
    <button type="submit" class="btn btn-info shadow margin-top-3-percent">Salvar</button>
</form>
<a href="{{ route('task.index', $idList) }}"><button class="shadow btn btn-dark margin-top-3-percent" type="button">Voltar</button></a>
@endsection