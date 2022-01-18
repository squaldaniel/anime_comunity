@extends('bootstrap.logado.loguedmodel')
@section("body")
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom" style="background-color: black;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-4 text-white">Animanquadri - Clube Online de Fãs</span>
      </a>
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Inicio</a></li>
        <li class="dropdown" >
            <a class="nav-link dropdown-toggle" href="#"  id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              Animação
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="#">Anime</a></li>
              <li><a class="dropdown-item" href="#">Desenhos</a></li>
              <li><a class="dropdown-item" href="#">Cartoon</a></li>
            </ul>
        </li>
        <li class="dropdown" >
            <a class="nav-link dropdown-toggle" href="#"  id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              Leitura
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="#">Mangás</a></li>
              <li><a class="dropdown-item" href="#">Quadrinhos</a></li>
              <li><a class="dropdown-item" href="#">Livros</a></li>
            </ul>
        </li>
        <li class="dropdown" >
            <a class="nav-link dropdown-toggle" href="#"  id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              Atuação
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="#">Séries</a></li>
              <li><a class="dropdown-item" href="#">Filmes</a></li>
            </ul>
        </li>
        <li class="dropdown" >
            <a class="nav-link dropdown-toggle" href="#"  id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Interação
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="#">Grupos</a></li>
              <li><a class="dropdown-item" href="#">Comunidades</a></li>
              <li><a class="dropdown-item" href="#">RPG´s</a></li>
              <li><a class="dropdown-item" href="#">Murais</a></li>
            </ul>
        </li>
      </ul>
    </header>
  </div>
<div class="container">
    <div class="row"  >
        <div class="col-md-2 shadow" style="border-radius: 20px; "   >
            <ul class="list-unstyled">
                <li class="dropdown-item d-flex gap-2 align-items-center">
                    <a href="/" class="nav-link text-primary"><span class="fa fa-users"></span> Membros</a>
                </li>
                <li class="dropdown-item d-flex gap-2 align-items-center">
                    <a href="/adm/videos" class="nav-link text-primary"><span class="fa fa-film"></span> Vídeos</a>
                </li>
                <li class="dropdown-item d-flex gap-2 align-items-center">
                    <a href="/users/request/" class="nav-link text-primary"><span class="fa fa-book">
                        </span> Quadrinhos
                    </a>
                </li>
                <li class="dropdown-item d-flex gap-2 align-items-center">
                    <a href="#" class="nav-link text-primary"><span class="fa fa-search"></span> Encontrar</a>
                </li>
            </ul>
            @include("bootstrap.premiumusers.premium")
            <ul class="list-unstyled">
                <li class="dropdown-item d-flex">
                    <a href="/perfil" class="nav-link text-white"><span class="fa fa-user fa-2x"></span> Perfil</a>
                </li>
            </ul>
        </div>
        <div class="col-md-8">
            <div>
                @section("mainarea")
                @show
            </div>
        </div>
        <div class="col-md-2">
            Sua Propaganda
        </div>
    </div>
</div>


@endsection
