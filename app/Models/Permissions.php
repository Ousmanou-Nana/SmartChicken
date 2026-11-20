<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permissions extends Model
{
    protected $table = 'permissions';

    protected $primaryKey = 'id_permission';

    protected $fillable = [
        'label_permission',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Roles::class, 'permission_role', 'id_permission', 'id_role');
    }
}
