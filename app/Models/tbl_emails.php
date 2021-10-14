<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_emails extends Model
{
    use HasFactory;
    public $table = 'tbl_emails';

    public $fillable = [
        "id",
        "email",
        "passkey",
        "active",
        "datecreation_at",
        "dateupdate_at"
    ];
}
