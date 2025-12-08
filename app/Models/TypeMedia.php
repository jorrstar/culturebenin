<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeMedia extends Model
{
    protected $table = 'type_medias';
    protected $primaryKey = 'id_type_media';
    public $timestamps = true;
    protected $fillable = ['nom_media'];

    public function medias(): HasMany
    {
        return $this->hasMany(Media::class, 'id_type_media', 'id_type_media');
    }
}
