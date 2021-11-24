<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;
use Illuminate\Support\Facades\Mail;
//# classes de email criadas
use App\Mail\NovoMembroMail;


class UsersControllers extends Controller
{
    public function newUser(Request $request)
        {

            if($request->input("logradouro")=="")
                {
                    return redirect()->back()->withErrors(['errors' => 'E necessário pegar os dados do cep']);
                }
            $sql = 'call add_membro(?, ?, ?, ?, ?, ?, ?, ? ,?, ?)';
            $hash_user = base64_encode(md5($_POST["email"].date('YmdHms').env("APP_KEY")));
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
                $_POST["uf"],
                $hash_user
            ];
            try {
                DB::select($sql, $newuser);
                Mail::to("danielshogans@kingkernel.com.br")->send(new NovoMembroMail($_POST["email"]));
                return view("bootstrap.inscrito");
            } catch (Throwable $th) {
                //print_r($th);
                echo "erro no e-mail";
                exit;
                switch($th->errorInfo[1])
                    {
                        case '1062':
                        return redirect()->back()->withErrors(['errors' => 'Email já cadastrado.']);
                        break;

                        default:
                        print_r($th->errorInfo[1]);
                        break;
                    }

            }
            
        }
    public function loginUser(Request $request)
        {
            print_r($request->input());
        }
    public function activeUser()
        {

        }
    public function userefetive()
        {
            if ($_POST["pass_1"]!=$_POST["pass_2"]){
                return redirect()->back()->withErrors(['errors' => 'as senhas não coicidem']);
            };
            DB::table("membros")->where("email", $_POST["willburys"])
                ->where("pwdsnh", $_POST["traveling"])->where("active", false)
                ->update(["active"=>true, "pwdsnh"=>base64_encode(sha1(md5($_POST["pass_2"])))]);
            return view("bootstrap.userefetive");
        }
}
