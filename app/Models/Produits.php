<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    protected $table = "protected";
    protected $primaryKey = 'id_produit';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'id_produit',
        'label_produit',
        'description_produit',
        'type_produit',
        'quantite_produit',
        'prix_produit',
        'id_user',
        'id_bloc'
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, 'id_user', 'id_user');
    }

    

}
