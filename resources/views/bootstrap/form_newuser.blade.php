@extends('bootstrap.model')
@section("body")
<style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  
  <!-- Custom styles for this template -->
  <link href="form-validation.css" rel="stylesheet">
</head>
<body class="bg-light">
  
<div class="container">
<main>
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h2>Seja membro do Clube</h2>
    <p class="lead">Abaixo há um formulário com os dados necessários para tornar-se membro deste clube de fãs. Inscreva-se gratuitamente antes de conhecer o plano Premium.</p>
  </div>
  <form action="/newuser/signin/" method="POST">
    @csrf
  <div class="row g-5">
    <div class="col-md-7 col-lg-8">
      <h4 class="mb-3">Cadastro de membro</h4>
      <form class="needs-validation" novalidate>
        <div class="row g-3">
          <div class="col-sm-6">
            <label for="firstName" class="form-label">Primeiro nome</label>
            <input type="text" class="form-control" id="nome" name="nome"  required>
            <div class="invalid-feedback">
              Campo Requerido.
            </div>
          </div>

          <div class="col-sm-6">
            <label for="lastName" class="form-label">Sobre nome</label>
            <input type="text" class="form-control" id="lastName" name="sobrenome">
            <div class="invalid-feedback">
              Campo Requerido.
            </div>
          </div>

          <div class="col-12">
            <label for="username" class="form-label">NickName</label>
            <div class="input-group has-validation">
              <span class="input-group-text">@</span>
              <input type="text" class="form-control" id="username" placeholder="Username" name="username">
            <div class="invalid-feedback">
                Campo Requerido.
              </div>
            </div>
          </div>

          <div class="col-12">
            <label for="email" class="form-label">E-mail </label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com">
            <div class="invalid-feedback">
                Campo Requerido.
            </div>
          </div>

          <div class="col-12">
            <label for="address2" class="form-label">Cep <span class="text-muted">(Optional)</span></label>
            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
          </div>

          <div class="col-12">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" placeholder="1234 Main St">
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

         <div class="col-12">
            <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
          </div>

          <div class="col-md-5">
            <label for="country" class="form-label">Country</label>
            <select class="form-select" id="country" >
              <option value="">Choose...</option>
              <option>United States</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>

          <div class="col-md-4">
            <label for="state" class="form-label">State</label>
            <select class="form-select" id="state" >
              <option value="">Choose...</option>
              <option>California</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>

          <div class="col-md-3">
            <label for="zip" class="form-label">Zip</label>
            <input type="text" class="form-control" id="zip" >
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>

        <hr class="my-4">

        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
      </form>
    </div>
  </div>
</main>
</form>

<footer class="my-5 pt-5 text-muted text-center text-small">
  <p class="mb-1">&copy; 2017–2021 Company Name</p>
  <ul class="list-inline">
    <li class="list-inline-item"><a href="#">Privacy</a></li>
    <li class="list-inline-item"><a href="#">Terms</a></li>
    <li class="list-inline-item"><a href="#">Support</a></li>
  </ul>
</footer>
</div>
@endsection