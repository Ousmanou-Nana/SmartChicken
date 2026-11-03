<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "user";
    protected $primaryKey = 'id_user';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'id_user',
        'nom_user',
        'prenom_user',
        'email_user',
        'phone_user',
        'sexe',
        'login_user',
        'statut_user',
        'password_user',

    ];
}
