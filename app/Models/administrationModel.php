<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\AccessTokenModel;

class administrationModel extends Model
{
    use HasFactory;
    public $table = "administration";
    public $fillable = [
        "email",
        "pwdsnh", 
        "active", 
        "level_adm", 
    ];
    public static function getEmail($id)
        {
            return self::where("id", "=", $id)->select("email")->get()->toArray();
        }
    public static function loginAuth($email, $hash)
        {
            $sql = 'call authAdministration(?, ?)';
            $auth = DB::select($sql, [$email, $hash]);
            if ($auth[0]->existe == 1){
                $data = self::authencate($email);
                $token = new AccessTokenModel;
                    $token->member_id = $data["id"];
                    $token->access_token = $data["token"];
                    $token->level_user = $data["level_user"];
                    $token->user_type = $data["type_user"];
                    try {
                            $token->save();
                        } catch (\Throwable $th) {
                            print_r($th);
                    }
                    return $data;
            } else {
                response('Unauthenticated.', 401);
                return redirect(route("inicio"));
            }
        }
    public static function authencate($email)
        {
            $level = DB::select("select type_user from allusers where email = ?", [$email]);
            $_SESSION["type_user"] = $level[0]->type_user;
            switch($level[0]->type_user)
                {
                    case "administration":
                        $user = DB::select("select email, level_adm, id from administration where email = ?", [$email]);
                        $_SESSION["email_adm"] = $email;
                        $_SESSION["level_user"] = $user[0]->level_adm;
                        $_SESSION["id"] = $user[0]->id;
                        $_SESSION["token"]= base64_encode(hash('sha512', /* crypt(sha1($email.date("Y-m-d"))),*/ bin2hex(sha1(md5("Junin-gai-jin")))) );
                    break;
                };
            //
            return $_SESSION;
        }
    public static function logout()
        {
            session_destroy();
        }
    public static function crypt($email)
        {
           // return 
        }
}
