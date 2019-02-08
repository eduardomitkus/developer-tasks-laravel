@extends('layouts.structure-dafault')
@section('content')
@section('title')
    Executando
@endsection
<a href="{{route('list.index')}}" class="margin-top-3-percent btn btn-info">Ir para suas Listas</a>

@if($tasks->count() > 0)
<div class="table-responsive">
    <table class="shadow table table-bordered margin-top-3-percent">
        <thead>
            <tr>
            <th scope="col">Titulo</th>            
            <th scope="col">Prioridade</th>
            <th scope="col">Lista Vinculada</th>
            <th scope="col">Tecnologia</th>
            </tr>
        </thead>
            @foreach ($tasks as $task)
        <tbody>
            <tr>
                <td>{{ $task->getTitle() }}</td>                
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
                <td><button class="shadow btn btn-outline-{{$btnColor}} btn-sm" type="button">{{ $task->getPriority() }}</button></td>
                <td>{{ $task->listTask()->first()->getTitle() }}</td>
                <td>{{ $task->listTask()->first()->technology()->first()->getName() }}</td>
            </tr>            
        </tbody>    
        @endforeach
    </table>
</div>
@else
<div class="alert alert-danger margin-top-3-percent">Não há Tasks</div>
@endif
@endsection