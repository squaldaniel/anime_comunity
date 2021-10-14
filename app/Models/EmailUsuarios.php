<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailUsuarios extends Model
{
    use HasFactory;
    public $table = 'tbl_emails';
    public $fillable = ['email', "passkey"];
}
