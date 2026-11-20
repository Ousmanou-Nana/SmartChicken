<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produits extends Model
{
    protected $table = 'produits';

    protected $primaryKey = 'id_produit';

    protected $fillable = [
        'label_produit',
        'description_produit',
        'type_produit',
        'quantite_produit',
        'prix_produit',
        'id_user',
        'id_bloc',
    ];

    protected function casts(): array
    {
        return [
            'quantite_produit' => 'integer',
            'prix_produit' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(Users::class, 'id_user', 'id_user');
    }

    public function bloc(): BelongsTo
    {
        return $this->belongsTo(Blocs::class, 'id_bloc', 'id_bloc');
    }
}
