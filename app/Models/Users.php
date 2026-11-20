<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Users extends Model
{
    protected $table = 'user';

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nom_user',
        'prenom_user',
        'email_user',
        'phone_user',
        'sexe',
        'login_user',
        'statut_user',
        'password_user',
    ];

    protected $hidden = [
        'password_user',
    ];

    protected function casts(): array
    {
        return [
            'password_user' => 'hashed',
        ];
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Roles::class, 'role_user', 'id_user', 'id_role');
    }

    public function produits(): HasMany
    {
        return $this->hasMany(Produits::class, 'id_user', 'id_user');
    }

    public function commandes(): HasMany
    {
        return $this->hasMany(Commandes::class, 'id_user', 'id_user');
    }
}
