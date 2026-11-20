<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commandes extends Model
{
    protected $table = 'commandes';

    protected $primaryKey = 'id_commande';

    protected $fillable = [
        'date_commande',
        'total_commande',
        'statut_commande',
        'id_user',
    ];

    protected function casts(): array
    {
        return [
            'date_commande' => 'datetime',
            'total_commande' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(Users::class, 'id_user', 'id_user');
    }
}
