@extends('layouts.structure-dafault')
@section('content')
@section('title')
Dashboard
@endsection
<div class="alert alert-info margin-top-3-percent">
    <p class="text-center">Gerencie suas tarefas de estudo e aumente sua produtividade no desenvolvimento de software</p>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body border border-secondary">
                <h5 class="card-title">Aguardando</h5>
                <p class="card-text">Há Tasks esperando para inicia-las?</p>
                <a href="{{ route('stage.waiting') }}" class="btn btn-info">Veja as Tasks</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body border border-info">
                <h5 class="card-title">Executando</h5>
                <p class="card-text">Vamos analisar o que você já está fazendo?</p>
                <a href="{{ route('stage.running') }}" class="btn btn-info">Veja as Tasks</a>
            </div>
        </div>
    </div>
</div>
<div class="row margin-top-2-percent">
    <div class="col-sm-6">
        <div class="card border border-success">
            <div class="card-body">
                <h5 class="card-title">Concluído</h5>
                <p class="card-text">Veja o que você concluiu</p>
                <a href="{{ route('stage.completed')}}" class="btn btn-info">Veja as Tasks</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body border border-dark">
                <h5 class="card-title">Todas as Tasks</h5>
                <p class="card-text">Olhe as tasks de todas as listas e de todos os estágios</p>
                <a href="{{ route('stage.all')}}" class="btn btn-dark">Veja as Tasks</a>
            </div>
        </div>
    </div>
</div>
@endsection