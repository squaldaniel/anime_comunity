@extends('bootstrap.model')
@section("head")
@endsection
@section("body")
<div class="px-4 pt-5 my-5 text-center border-bottom">
  <h1 class="display-4 fw-bold">Show!!</h1>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4">Agora você é membro. Confirme em seu e-mail o link para criação de senha e desfrute da melhor comunidade de animes e super-hérois do mundo.</p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
    </div>
  </div>
  <div class="overflow-hidden" style="max-height: 30vh;">
    <div class="container px-5">
      <img src="{{asset("cover.jpg")}}" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
    </div>
  </div>
</div>
@endsection