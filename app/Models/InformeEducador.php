<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InformeEducador extends Model
{
    use HasFactory;
    protected $table = 'informe_educador';
    public function user():BelongsTo{
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    public function alertas():HasMany{
        return $this->hasMany(Alertas::class);
    }
}
