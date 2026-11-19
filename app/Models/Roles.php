<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = "roles";
    protected $primaryKey = 'id_role';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'label',
    ] ;
}
