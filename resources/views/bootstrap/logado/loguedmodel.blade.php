<?php
$region = 'pt-br';
?>
<!DOCTYPE html>
<html lang="{{$region}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Animanquadri - {{date("Y")}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <!--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  referrerpolicy="no-referrer" />
    -->
    <link rel="stylesheet" href="{{asset("css/fontawesome.all.min.css")}}"  referrerpolicy="no-referrer" />
    <style>
    @font-face {
        font-family: "Alternitty";
        src: url("{{asset('Alternitty.ttf')}}") format('truetype');
    }
    .personal {
        font-family: "Alternitty";
        color: Black;
    }
    </style>
@section("scripthead")
@show
</head>
<body>
    @section("head")
    @show
    @section("body")
    @show
    @section("footer")
    @show
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>
@section("scripfooter")
@show
</html>
