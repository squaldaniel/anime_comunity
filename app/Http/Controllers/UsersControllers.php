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
            //$sql = 'call add_membro(:param1, :param2, :param3, :param4, :param5, :param6, :param7 , :param8, :param9, :param10)';
            $hash_user = base64_encode(md5($_POST["email"].date('YmdHms').env("APP_KEY")));
            $cep = str_replace('-', '', $_POST["cep"]);
            /*
            $newuser = [
                ":param1"=>$_POST["email"],
                ":param2"=>$_POST["nome"],
                ":param3"=>$_POST["sobrenome"],
                ":param4"=>$cep,
                ":param5"=>$_POST["logradouro"],
                ":param6"=>$_POST["numero"],
                ":param7"=>$_POST["bairro"],
                ":param8"=>$_POST["localidade"],
                ":param9"=>$_POST["uf"],
                ":param10"=>$hash_user
            ];
            */
            $sql = 'call add_membro("'.$_POST["email"].'", "'.$_POST["nome"].'", "'.$_POST["sobrenome"]
                .'", "'.$cep.'", "'.$_POST["logradouro"].'", "'.$_POST["numero"].'", "'.$_POST["bairro"]
                .'" , "'.$_POST["localidade"].'", "'.$_POST["uf"].'", "'.$hash_user.'")';
            try {
                DB::connection("mysql")->statement($sql); //, $newuser);
                //DB::select($sql, $newuser);
                Mail::to($_POST["email"])->send(new NovoMembroMail($_POST["email"]));
                return view("bootstrap.inscrito");
            } catch (Throwable $th) {
                switch($th->errorInfo[1])
                    {
                        case '1062':
                        return redirect()->back()->withErrors(['errors' => 'Email já cadastrado.']);
                        break;

                        default:
                        //print_r($th->errorInfo[1]);
                        //print_r($th);
                        echo "sem descrição";
                        break;
                    }

            }

        }
    public function loginUser(Request $request)
        {
            $sql = DB::table("membros")->select(DB::raw("count(*) as existe"))
                ->where("email", $request->input("emailinput"))
                ->where("pwdsnh", base64_encode(sha1(md5($request->input("pwdsnh")))))
                ->where("active", true)
                ->get();
            if($sql[0]->existe == 1){
                echo "pode logar!";
            } else {
                echo "não loga!!";
            };
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
