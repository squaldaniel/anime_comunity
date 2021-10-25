<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;


class UsersControllers extends Controller
{
    public function newUser(Request $request)
        {
            if($request->input("logradouro")=="")
                {
                    return redirect()->back()->withErrors(['errors' => 'E necessário pegar os dados do cep']);
                }
            $sql = 'call add_membro(?, ?, ?, ?, ?, ?, ?, ? ,?)';
            $cep = str_replace('-', '', $_POST["cep"]);
            $newuser = [
                $_POST["email"],
                $_POST["nome"],
                $_POST["sobrenome"],
                $cep,
                $_POST["logradouro"],
                $_POST["numero"],
                $_POST["bairro"],
                $_POST["localidade"],
                $_POST["uf"]
            ];
            try {
                DB::select($sql, $newuser);
            } catch (Throwable $th) {
                switch($th->errorInfo[1])
                    {
                        case '1062':
                        return redirect()->back()->withErrors(['errors' => 'Email já cadastrado.']);
                        break;
                    }

            }
            
        }
}
