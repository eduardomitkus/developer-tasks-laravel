@extends('layouts.structure-dafault')
@section('content')
@section('title')
Editar Task
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
<form method="POST" action="{{ route('task.update', $task->getId()) }}" class="shadow margin-top-3-percent padding-3-percent">
    @csrf
    <input name="_method" type="hidden" value="PUT">
    <input name="list_task_id" type="hidden" value="{{ $idList }}">
    <div class="form-group">
        <label>Titulo</label>
        <input name="title" type="text" class="form-control form-control-lg" value="{{ $task->getTitle() }}">
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <textarea name="description" type="text" class="form-control" rows="3"> {{ $task->getDescription() }}</textarea>        
    </div>
    <div class="form-group">
        <select class="form-control" id="exampleFormControlSelect1" name="priority">
            <option selected>Selecione um nível de prioridade</option>
            <option {{ $task->priorityIsLow() ? 'selected' : '' }} value="{{ $task->getPriority() }}">Baixa</option>
            <option {{ $task->priorityIsAverage() ? 'selected' : '' }} value="{{ $task->getPriority() }}">Média</option>
            <option {{ $task->priorityIsHigh() ? 'selected' : '' }} value="{{ $task->getPriority() }}">Alta</option>            
        </select>
    </div>
    @if ($task->taskIsWaiting())
    <div class="alert alert-info">
        <input value="ola" type="checkbox" name="start"> Iniciar task?<br>
    </div>
    @elseif($task->taskIsCompleted())
    <div class="alert alert-info">
        <label><input type="radio" name="waiting"> Mover para Aguardando?</label><br>
        <label><input type="radio" name="start"> Iniciar Novamente?</label>        
    </div>
    @elseif($task->taskIsRunning())
    <div class="alert alert-success">
        <label><input type="radio" name="waiting"> Mover para Aguardando?</label><br>
        <input value="ola" type="radio" name="conclused"> Concluír task?<br>
    </div>
    @endif
    <br>    
    <button type="submit" class="btn btn-info shadow margin-top-3-percent">Salvar</button>
</form>
<a href="{{ route('task.index', $idList) }}"><button class="shadow btn btn-dark margin-top-3-percent" type="button">Voltar</button></a>
@endsection