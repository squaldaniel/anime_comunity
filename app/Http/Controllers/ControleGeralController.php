<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\administrationModel;

class ControleGeralController extends Controller
{
    public function index()
        {
            return view("bootstrap.controleGeral");
        }
    public function login()
        {
            $pwdhash = sha1(md5($_POST["floatingPassword"]));
            $guest = administrationModel::loginAuth($_POST["floatingInput"], $pwdhash);
            return $guest;
        }
}
