<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Langue extends Model
{
    protected $table = 'langues';
    protected $primaryKey = 'id_langue';
    public $timestamps = true;
    protected $fillable = ['nom_langue','code_langue','description'];

    public function utilisateurs(): HasMany
    {
        return $this->hasMany(Utilisateur::class, 'id_langue', 'id_langue');
    }

    public function contenus(): HasMany
    {
        return $this->hasMany(Contenu::class, 'id_langue', 'id_langue');
    }

    public function regions(): BelongsToMany
    {
        return $this->belongsToMany(Region::class, 'parler', 'id_langue', 'id_region')->withTimestamps();
    }
}
