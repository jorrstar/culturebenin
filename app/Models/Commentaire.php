<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commentaire extends Model
{
    protected $table = 'commentaires';
    protected $primaryKey = 'id_commentaire';
    public $timestamps = true;
    protected $fillable = ['texte','note','date','id_utilisateur','id_contenu'];

    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur', 'id_utilisateur');
    }

    public function contenu(): BelongsTo
    {
        return $this->belongsTo(Contenu::class, 'id_contenu', 'id_contenu');
    }
}
