<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vaccins extends Model
{
    protected $table = 'vaccins';

    protected $primaryKey = 'id_vaccin';

    protected $fillable = [
        'label_vaccin',
        'prix_vaccin',
    ];

    protected function casts(): array
    {
        return [
            'prix_vaccin' => 'integer',
        ];
    }

    public function blocs(): BelongsToMany
    {
        return $this->belongsToMany(Blocs::class, 'bloc_vaccin', 'id_vaccin', 'id_bloc');
    }
}
