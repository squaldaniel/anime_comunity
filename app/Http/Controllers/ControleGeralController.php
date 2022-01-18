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
    public function cadobject(Request $request)
        {
            print_r($request->all());
            $name = uniqid(date('HisYmd'));
            $extension = $request->imagem->extension();
            $upload = $request->imagem->storeAs(null, $name.'.'.$extension);
            /*
(
    [_token] => 3MrCykct1hBfMRVDntBAECTTWRnidPUP1plFGXg3
    [objtype] => 7
    [nomeobject] => dasdas
    [imagem] => Illuminate\Http\UploadedFile Object
            [test:Symfony\Component\HttpFoundation\File\UploadedFile:private] =>
            [originalName:Symfony\Component\HttpFoundation\File\UploadedFile:private] => 0be20a3205e4c4e996badcb8df91da6e.jpg
            [mimeType:Symfony\Component\HttpFoundation\File\UploadedFile:private] => image/jpeg
            [error:Symfony\Component\HttpFoundation\File\UploadedFile:private] => 0
            [hashName:protected] =>
            [pathName:SplFileInfo:private] => C:\Users\hogans\AppData\Local\Temp\php99A3.tmp
            [fileName:SplFileInfo:private] => php99A3.tmp
             */
        }
}
