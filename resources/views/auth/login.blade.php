@extends('layouts.head-default')
@section('title')
    Login
@endsection

@section('body') 

    <body>
        <div  class="wrapper fadeInDown">                                            
            <div id="formContent">
                <div class="fadeIn first">
                    <h3 id="developer">Developer Tasks</h3>
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
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="text" id="email" class="fadeIn second" name="email" placeholder="email" value="{{ old('email') }}" >                                               
                    <input type="password" id="password" class="fadeIn third" name="password" placeholder="senha">                      
                    <input class="btn btn-primary" type="submit" value="Entrar">
                </form>
                <div id="formFooter">                    
                        @if (Route::has('register'))                        
                        <a href="{{ route('register') }}"><button class="shadow btn btn-info margin-top-3-percent" type="button">Cadastre-se</button></a><br>
                        @endif           
                </div>                            
            </div>
        </div>
    </body>
@endsection
