@extends("bootstrap.model")
@section("body")
<div class="container">
<div class="col-md-4">
    <div class="panel panel-default">
  <div class="panel-heading"><h3 class="panel-title"><strong>Admin Panel </strong></h3></div>
  <div class="panel-body">
   <form role="form" >
    
  <div class="form-group">
    <label for="exampleInputEmail1">Email:</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password </label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
  </div>
</div>
</div>
</div>
@endsection