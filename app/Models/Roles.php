<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Roles extends Model
{
    protected $table = 'roles';

    protected $primaryKey = 'id_role';

    protected $fillable = [
        'label',
    ];

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permissions::class, 'permission_role', 'id_role', 'id_permission');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(Users::class, 'role_user', 'id_role', 'id_user');
    }
}
