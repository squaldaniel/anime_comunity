@extends("bootstrap.model")
@section("body")
<div class="container px-4 py-5" id="hanging-icons">
    <h2 class="pb-2 border-bottom">Bem vindo a melhor comunidade de fãs de Super-Heróis</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#toggles2"></use></svg>
        </div>
        <div>
          <h2>Animes de montão organizados!</h2>
          <p>Estamos catalogando a maior quantidade de animes possivel e disponibilizando os links para que você assista a vontade a hora que quiser e onde estiver.</p>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#cpu-fill"></use></svg>
        </div>
        <div>
          <h2>Mangás e Quadrinhos</h2>
          <p>Quadrinhos e mangás para poder ler, colecionar, conhecer e comentar. Nossa intenção é fazer os fãs encontrarem-se e interagirem</p>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#tools"></use></svg>
        </div>
        <div>
          <h2>Não perca mais tempo!!</h2>
          <p>Confirme seu e-mail clicando no link abaixo e comece a interagir em nossa comunidade</p>
          <a href="http://{{$_SERVER["HTTP_HOST"]}}/useractive/{{$user->pwdsnh}}" class="btn btn-primary">
            Confirmar
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection