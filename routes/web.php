<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControleGeralController;
use App\Http\Controllers\UsersControllers;
use App\Models\administrationModel;

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

Route::get("teste/{id}",  function($id){
    print_r(administrationModel::getEmail($id));
});
Route::post("controlegeral/login/",  [ControleGeralController::class, "login"]);
Route::get("paineldecontrole/",  [administrationModel::class, "authencate"])->name("painel");
Route::get("logout/", function(){
    session_start();
    administrationModel::logout();
    return redirect(route("inicio"));
});