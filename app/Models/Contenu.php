<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contenu extends Model
{
    protected $table = 'contenus';
    protected $primaryKey = 'id_contenu';
    public $timestamps = true;
    protected $fillable = [
        'titre','texte','date_creation','statut','parent_id','date_validation',
        'id_region','id_langue','id_moderateur','id_type_contenu','id_auteur'
    ];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'id_region', 'id_region');
    }

    public function langue(): BelongsTo
    {
        return $this->belongsTo(Langue::class, 'id_langue', 'id_langue');
    }

    public function auteur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'id_auteur', 'id_utilisateur');
    }

    public function moderateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'id_moderateur', 'id_utilisateur');
    }

   public function type()
{
    return $this->belongsTo(TypeContenu::class, 'id_type_contenu', 'id_type_contenu');
}


    public function medias(): HasMany
    {
        return $this->hasMany(Media::class, 'id_contenu', 'id_contenu');
    }

    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class, 'id_contenu', 'id_contenu');
    }

    public function parent()
    {
        return $this->belongsTo(Contenu::class, 'parent_id', 'id_contenu');
    }

    public function children()
    {
        return $this->hasMany(Contenu::class, 'parent_id', 'id_contenu');
    }
}
