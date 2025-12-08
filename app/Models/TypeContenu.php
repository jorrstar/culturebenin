<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeContenu extends Model
{
    protected $table = 'type_contenus';
    protected $primaryKey = 'id_type_contenu';
    public $timestamps = true;
    protected $fillable = ['nom_contenu'];

    public function contenus(): HasMany
    {
        return $this->hasMany(Contenu::class, 'id_type_contenu', 'id_type_contenu');
    }
}
