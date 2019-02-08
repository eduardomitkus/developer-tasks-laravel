@extends('layouts.structure-dafault')
@section('content')
@section('title')    
Tecnologias
@endsection
@if(session()->has('sucess'))
<div class="alert alert-success margin-top-3-percent">
    {{ session()->get('sucess') }}
</div>
@endif
<a href="{{ route('technology.create') }}"><button class="shadow btn btn-info margin-top-3-percent" type="button">Cadastrar Tecnologia</button></a><br>
@if($technologies->count() > 0)
<div class="table-responsive">
    <table class="shadow table table-bordered margin-top-3-percent">
        <thead>
            <tr>
                <th scope="col">Nome da Tecnologia</th>
                <th scope="col">Plataforma</th>
                <th style="width: 7%;" scope="col" colspan="2">Ações</th>
            </tr>
        </thead>
        @foreach ($technologies as $technology)
        <tbody>
            <tr>
                <td>{{ $technology->getName() }}</td>
                <td>{{ $technology->getPlatform() }}</td>
                <td class="text-center"><a href="{{ route('technology.edit', $technology->getId()) }}" class="text-info"><i title="Editar" class="fas fa-edit"></i></a></td>
                <td class="text-center">
                    @if ($technology->notHasLists())
                    <form action="{{ route('technology.destroy', $technology->getId()) }}" method="POST">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="text-info button-icon"><i title="Excluir" class="fas fa-trash-alt"></i></button>
                    </form>
                    @else
                    <button type="button" class="btn btn-sm btn-primary" disabled><i title="Não é possível Excluir" class="fas fa-trash-alt"></i></button>
                    @endif
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@else
<div class="alert alert-danger margin-top-3-percent">Não há Tecnologia cadastrada</div>
@endif
<a href="{{ route('home') }}"><button class="shadow btn btn-dark margin-top-3-percent" type="button">Voltar</button></a>
@endsection