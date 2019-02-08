@extends('layouts.head-default')
@section('title')
Cadastro
@endsection
@section('body')
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <div class="fadeIn first">
                <h3 id="developer">Cadastro</h3>
            </div>
            @if ($errors->any())
            <div class="container lead text-danger">
                @foreach ($errors->all() as $error)
                @if(count($errors->all()) == 1)
                <p class="text-center">{{ $error }}</p>
                @else                    
                <p class="text-center">{{ $error }}</p>
                @endif
                @endforeach
            </div>
            @endif
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="text" class="fadeIn second" name="name" placeholder="Nome" value="{{ old('name') }}">                                              
                <input type="text" class="fadeIn second" name="nick_name" placeholder="Nick" value="{{ old('nick_name') }}" >                                                
                <input type="text" id="email" class="fadeIn second" name="email" placeholder="email" value="{{ old('email') }}" >                                               
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="senha">                    
                <input type="password" id="password" class="fadeIn third" name="password_confirmation" placeholder="Confirmação de Senha">                        
                <input class="btn btn-primary" type="submit" value="Enviar">
            </form>
            <div id="formFooter">
                <a class="text-dark" href="{{ route('login') }}">Voltar ao Login</a>                
            </div>
        </div>
    </div>
</body>
@endsection