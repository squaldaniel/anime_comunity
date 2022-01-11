<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControleGeralController;
use App\Http\Controllers\UsersControllers;
use App\Models\administrationModel;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('bootstrap.index');
})->name("inicio");
/* USUÁRIOS */
Route::get("newuser/", function(){
    return view("bootstrap.form_newuser");
});
Route::post("newuser/signin/", [UsersControllers::class, "newUser"]);
Route::get("/controlegeral", [ControleGeralController::class, "index"]);
Route::post("controlegeral/login/",  [ControleGeralController::class, "login"]);
Route::get("paineldecontrole/",  [administrationModel::class, "authencate"])->name("painel");
Route::get("logout/", function(){
    session_start();
    administrationModel::logout();
    return redirect(route("inicio"));
});
Route::post('siginlogin/', [UsersControllers::class, "loginUser"]);
Route::get('useractive/{hash?}', function($hash=null){
    if(isset($hash)){
        if($user = DB::table("membros")->where("pwdsnh", $hash)->where("active", false)->get()->toArray())
            {
                $usuario = ["usuario"=>$user[0]];
                return view("bootstrap.changepasswd")->with($usuario);
            }
    } else {
        return redirect("/");
    }
});

/* ROTAS DE TESTE */
Route::get("teste/",  function(){
    return view("bootstrap.changepasswd");
});
Route::get('inscrito/', function(){
    $email = 'danielshogans@kingkernel.com.br';
    $dados = DB::table("membros")->where('email', $email)->get()->toArray();
    $ip = 'http://'.$_SERVER["HTTP_HOST"];
    $dados[0]->ip = $ip;
    //return view("bootstrap.inscrito");
    return view('bootstrap.mails.mail_newuser')->with(["user"=>$dados[0]]);
});
Route::post("userefetive/", [UsersControllers::class, "userefetive"]);
