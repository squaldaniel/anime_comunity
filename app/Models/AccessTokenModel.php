<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessTokenModel extends Model
{
    use HasFactory;
    public $table = 'tokens_access';
    public $fillable = [
        "member_id",
        "access_token",
        "level_user "
    ];
    public $timestamps = false;
}
