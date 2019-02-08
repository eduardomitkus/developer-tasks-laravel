<nav class="navbar navbar-expand-md">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">                
                <li class="nav-item active">
                    <a class="nav-link text-info" href="{{ route('home') }}">Developer Tasks</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-secondary" href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="{{ route('developer.profile') }}">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="{{ route('list.index') }} ">Lista de Tasks</a>
                </li>                               
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="{{ route('technology.index') }} ">Tecnologias</a>
                </li>                               
            </ul>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">            
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <p class="nav-link text-info">
                        Olá {{ auth()->user()->getNickName() }}
                    </p>                       
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="{{ route('logout') }}">
                        Sair
                    </a>                       
                </li>                
            </ul>
        </div>    
    </nav>