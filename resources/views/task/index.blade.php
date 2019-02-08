@extends('layouts.structure-dafault')
@section('content')
@section('title')    
Tasks de {{ $developerList->getTitle() }} - {{ $developerList->technology()->first()->getName() }}   
@endsection
@if(session()->has('sucess'))
<div class="alert alert-success margin-top-3-percent">
    {{ session()->get('sucess') }}
</div>
@endif
<a href="{{ route('task.create', $developerList->getId()) }}"><button class="shadow btn btn-info margin-top-3-percent" type="button">Nova Task</button></a><br>
@if($listTasks->count() > 0)
<div class="table-responsive">
    <table class="shadow table table-bordered margin-top-3-percent">
        <thead>
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Estágio</th>
                <th scope="col">Prioridade</th>
                <th style="width: 10%;" scope="col">Movimentar</th>
                <th style="width: 7%;" scope="col" colspan="3">Ações</th>
            </tr>
        </thead>
        @foreach ($listTasks as $task)
        <tbody>
            <tr>
                <td>{{ $task->getTitle() }}</td>
                <td>{{ $task->getStage() }}</td>
                <td>
                    @php
                    $btnColor;
                    switch ($task) {
                        case $task->priorityIsLow():
                            $btnColor = 'secondary';
                            break;
                        case $task->priorityIsAverage():
                            $btnColor = 'success';
                            break;
                        case $task->priorityIsHigh():
                            $btnColor = 'danger';
                            break;                    
                    }
                    @endphp
                    <button class="shadow btn btn-outline-{{$btnColor}} btn-sm" type="button">{{ $task->getPriority() }}</button>                
                </td>
                <td class="text-center">
                    @if ($task->taskIsRunning() || $task->taskIsWaiting())                    
                    <form action="{{ route('task.updateStage', $task->getId()) }}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="PUT">
                        <input name="list_task_id" type="hidden" value="{{ $developerList->getId() }}">
                        @if($task->taskIsRunning())       
                        <input name="conclused" type="hidden" value="conclused">
                        <button class="shadow btn btn-info btn-sm">Concluir</button>
                        @elseif($task->taskIsWaiting()) 
                        <input name="start" type="hidden" value="start">
                        <button class="shadow btn btn-primary btn-sm" type="submit">Iniciar</button>                                        
                        @endif
                    </form>
                    @elseif($task->taskIsCompleted())        
                    <button class="shadow btn btn-outline-info btn-sm" type="button">Concluída</button>
                    @endif                
                </td>
                <td><a href="{{ route('task.edit', [$developerList->getId(),$task->getId()]) }}" class="text-info"><i title="Editar" class="fas fa-edit"></i></a></td>
                <td>
                    <form action="{{ route('task.destroy', $task->getId())}}" method="POST">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <input name="list_task_id" type="hidden" value="{{ $developerList->getId() }}">
                        <button type="submit" class="text-info button-icon"><i title="Excluir" class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach        
    </table>
</div>
@else
<div class="alert alert-danger margin-top-3-percent">Não há Tasks nesta lista</div>
@endif
<a href="{{ route('list.index') }}"><button class="shadow btn btn-dark margin-top-3-percent" type="button">Voltar</button></a>
@endsection