@extends('bootstrap.model')
@section("body")
<div class="container my-5">
  <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
    <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">

      @if(count($errors) > 0 )
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <ul class="p-0 m-0" style="list-style: none;">
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
    


      <h1 class="display-4 fw-bold lh-1">Entre para o nosso mundo de Fãs</h1>
      <p class="lead">Seja Membro da melhor comunidade de fãs e entusiastas de super-hérois.</p>
      <div class="row">
        <form action="/newuser/signin/" method="POST">
          @csrf
          <div class="col">
            <div class="mb-2 row">
              <div class="col-sm-5">
                <input type="email" class="form-control" name="email" placeholder="E-mail" required>
              </div>
              <div class="col-sm-5">
                <span id="logradouro_span">Rua:</span><input type="hidden" name="logradouro" id="logradouro" required>
              </div>
            </div>
            <div class="mb-4 row">
              <div class="col-sm-5">
                <input type="text" class="form-control" name="nome" placeholder="Nome" required>
              </div>
              <div class="col-sm-5">
                <span id="bairro_span">Bairro:</span><input type="hidden" name="bairro" id="bairro" required>
              </div>
            </div>
            <div class="mb-4 row">
              <div class="col-sm-5">
                <input type="text" class="form-control" name="sobrenome" placeholder="Sobrenome" required>
              </div>
              <div class="col-sm-5">
                <span id="localidade_span">Cidade:</span><input type="hidden" name="localidade" id="localidade" required>
              </div>
            </div>
            <div class="mb-4 row">
              <div class="col-sm-5">
                <input type="text" class="form-control" name="cep" id='cep' placeholder="CEP" required><span class="btn btn-success" id="getcep_btn" >Pegar dados</span>
              </div>
              <div class="col-sm-5">
                <span id="uf_span">UF:</span><input type="hidden" name="uf" id="uf">
              </div>
            </div>
            <div class="mb-4 row">
              <div class="col-sm-5">
                <input type="text" class="form-control" name="numero" id='numero' placeholder="Número" required>
              </div>
            </div>
          </div>
      </div>
      <input type="reset" class="btn btn-outline-secondary btn-lg px-4" value="Limpar">
      <input type="submit" id="submit-btn" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold" value="Fazer parte">
    </div>
  </form>
    <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
        <img class="rounded-lg-3" alt="" width="370" src="{{asset("legal3.gif")}}">
    </div>
  </div>
</div>
<div id="oculta"></div>
@endsection
@section("footer")
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#oculta").hide();
  $("#getcep_btn").click(function(){
    let precep = $("#cep").val();
    let cep = precep.replace("-", '');
      getCep(cep);
  });
  $("#submit-btn").click(function(){
    let logradouro = $("#logradouro").val();
    if (logradouro == ''|| logradouro == null)
      {
        alert('é preciso pesquisar o CEP e obter o logradouro.');
        return false;
      }
  });
});
 $("#cep").mask("00000-000");
  function getCep(cep){
    if(cep.length < 8){
        alert("Precisa de 8 digitos!");
        $("cep").focus();
        return false;
      } else {
        var url = 'http://viacep.com.br/ws/'+ cep +'/json/';
        $("#oculta").load(url, function(data)
            {
                var obj = jQuery.parseJSON(data);
                $("#bairro").val(obj.bairro);
                $("#bairro_span").html("Bairro: <b>"+ obj.bairro+"</b>");
                $("#logradouro").val(obj.logradouro);
                $("#logradouro_span").html("Rua: <b>"+ obj.logradouro +"</b>");
                $("#localidade").val(obj.localidade);
                $("#localidade_span").html("Cidade: <b>"+ obj.localidade +"</b>");
                $("#uf").val(obj.uf);
                $("#uf_span").html("UF: <b>"+ obj.uf +"</b>");
            });
        }
      }
</script>
@endsection