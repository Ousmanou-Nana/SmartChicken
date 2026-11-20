<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blocs extends Model
{
    protected $table = 'blocs';

    protected $primaryKey = 'id_bloc';

    protected $fillable = [
        'label_bloc',
    ];

    public function produits(): HasMany
    {
        return $this->hasMany(Produits::class, 'id_bloc', 'id_bloc');
    }

    public function vaccins(): BelongsToMany
    {
        return $this->belongsToMany(Vaccins::class, 'bloc_vaccin', 'id_bloc', 'id_vaccin');
    }
}
