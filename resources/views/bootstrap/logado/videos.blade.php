@php
$classe = DB::table("categorias")->get()->toArray();
$type = DB::table("obj_type")->get()->toArray();
@endphp
@extends("bootstrap.logado.adminpainel")
@section("mainarea")
<form method="POST" action="/adm/cadobject" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <label for="cateobject" class="col-sm-2 col-form-label">Classe :</label>
        <div class="col-sm-4" name="cateobject">
            <select class="form-select">
                <option value="">Escolha Classe</option>
                @foreach ($classe as $key=>$value)
                    <option value="{{$value->id}}">{{$value->categoria}}</option>
                @endforeach
            </select>
        </div>
        <label for="objtype" class="col-sm-2 col-form-label">Categoria :</label>
        <div class="col-sm-3">
            <select class="form-select" name="objtype">
                <option value="">Escolha Classe</option>
                @foreach ($type as $key=>$value)
                    <option value="{{$value->id}}">{{$value->obj_type}}</option>
                @endforeach
            </select>
        </div>
      </div>
    <div class="row mb-3">
      <label for="imagem" class="col-sm-2 col-form-label">Imagem :</label>
      <div class="col-sm-10">
        <input type="file" class="form-control" name="imagem">
      </div>
    </div>
    <div class="row mb-3">
      <label for="nomeobject" class="col-sm-2 col-form-label">Nome :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nomeobject">
      </div>
    </div>
    <div class="row mb-3">
        <label for="linkobject" class="col-sm-2 col-form-label">link Object:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="libkobject">
        </div>
      </div>

    <div class="row mb-3">

    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>
  <table class="table table-striped">
      <thead>
      </tr>
        <td>Nome</td>
        <td>Categoria</td>
        <td>Tipo</td>
      </tr>
      </thead>
  </table>
@endsection
