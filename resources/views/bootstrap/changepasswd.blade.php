@extends("bootstrap.model")
@section("body")
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Falta pouco!!</h1>
        <p class="col-lg-10 fs-4">Email, <strong class="badge bg-primary">{{$usuario->email}}</strong>, confirmado<code>!!</code> Você precisa escolher uma senha para que possamos ativar sua conta.</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-light" action="http://{{$_SERVER["HTTP_HOST"]}}/userefetive/" method="POST">
            @csrf
            <input type="hidden" value="{{$usuario->pwdsnh}}" name="traveling">
            <input type="hidden" value="{{$usuario->email}}" name="willburys">
          <div class="form-floating mb-3">
            <input type="password" class="form-control" name="pass_1" placeholder="Senha:">
            <label for="floatingInput">Senha:</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" name="pass_2" placeholder="re-digite">
            <label for="floatingPassword">Re-digite</label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Ativar</button>
          <hr class="my-4">
          <small class="text-muted">Ao clicar em ativar, você está concordando com nossos <a href="#">Termos de utilização</A></small>
        </form>
      </div>
    </div>
  </div>
@endsection