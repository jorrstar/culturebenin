<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id_role';

    protected $fillable = [
        'nom_role', // ← obligatoire
    ];

    public $timestamps = false; // tu peux mettre true si tu as created_at et updated_at
}
