<?php
namespace App\Models;
 
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use Notifiable;

    protected $table = 'utilisateurs';
    protected $primaryKey = 'id_utilisateur';
    public $timestamps = true;
    
    protected $fillable = [
        'nom','email','mot_de_passe','prenom','sexe',
        'date_inscription','date_naissance','statut','photo',
        'id_role','id_langue', 'provider_name', 'provider_id', 'email_verified_at','otp_code','otp_expires_at','otp_purpose'
    ];
    
    protected $hidden = ['mot_de_passe', 'remember_token','otp_code'];

    protected $casts = [
    'email_verified_at' => 'datetime',
    'otp_expires_at' => 'datetime',
];
    
    protected $guard = 'web'; 

    // ✅ CORRECTION : Colonne pour le mot de passe
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'id_role', 'id_role');
    }

    public function langue(): BelongsTo
    {
        return $this->belongsTo(Langue::class, 'id_langue', 'id_langue');
    }

    public function contenusEcrits(): HasMany
    {
        return $this->hasMany(Contenu::class, 'id_auteur', 'id_utilisateur');
    }

    public function contenusModeres(): HasMany
    {
        return $this->hasMany(Contenu::class, 'id_moderateur', 'id_utilisateur');
    }

    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class, 'id_utilisateur', 'id_utilisateur');
    }

    public function isAdmin()
    {
        return $this->id_role === 1; // 1 = ID admin
    }
    // Dans app/Models/Utilisateur.php

// AJOUTEZ CE CODE APRÈS vos autres relations (après la méthode commentaires()):

public function subscriptions(): HasMany
{
    return $this->hasMany(Subscription::class, 'utilisateur_id', 'id_utilisateur');
}

public function activeSubscription()
{
    return $this->subscriptions()
                ->where('status', 'active')
                ->where('ends_at', '>', now())
                ->latest()
                ->first();
}

public function hasActiveSubscription(): bool
{
    return (bool) $this->activeSubscription();
}
}