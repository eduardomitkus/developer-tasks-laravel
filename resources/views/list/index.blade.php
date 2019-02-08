@extends('layouts.structure-dafault')
@section('content')
@section('title')
Lista de Tasks
@endsection
@if(session()->has('sucess'))
<div class="alert alert-success margin-top-3-percent">
    {{ session()->get('sucess') }}
</div>
@endif
<a href="{{ route('list.create') }}"><button class="shadow btn btn-info margin-top-3-percent" type="button">Nova Lista</button></a><br>
@if($listsTasks->count() > 0)
<div class="table-responsive">
    <table class="shadow table table-bordered margin-top-3-percent">
        <thead>
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Decrição</th>
                <th scope="col">Tecnologia</th>
                <th style="width: 20%;" scope="col">Quantidade de Tasks</th>
                <th style="width: 7%;" scope="col">Tasks</th>
                <th style="width: 7%;" scope="col" colspan="2">Ações</th>
            </tr>
        </thead>
        @foreach ($listsTasks as $list)
        <tbody>
            <tr>
                <td>{{ $list->getTitle() }}</td>
                <td>{{ $list->getDescription() }}</td>
                <td class="text-center"><button type="button" class="btn btn-outline-info">{{ $list->technology()->first()->getName() }}</button></td>
                <td>{{ $list->getTotalTasks() }}</td>
                <td class="text-center"><a href="{{ route('task.index', $list->getId()) }}" class="text-info"><i title="Ver tasks" class="fas fa-list-alt"></i></a></td>
                <td class="text-center"><a href="{{ route('list.edit', $list->getId()) }}" class="text-info"><i title="Editar" class="fas fa-edit"></i></a></td>
                <form action="{{ route('list.destroy', $list->getId()) }}" method="POST">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <td class="text-center"><button type="submit" class="text-info button-icon"><i title="Excluir" class="fas fa-trash-alt"></i></button></td>
                </form>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@else
<div class="alert alert-danger margin-top-3-percent">Não há Listas de Tasks</div>
@endif
<a href="{{ route('home') }}"><button class="shadow btn btn-dark margin-top-3-percent" type="button">Voltar</button></a>
@endsection