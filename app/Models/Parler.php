<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Parler extends Pivot
{
    protected $table = 'parler';
    public $incrementing = false;
    public $timestamps = true;
}
