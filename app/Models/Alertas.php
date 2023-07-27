<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alertas extends Model
{
    use HasFactory;
    protected $table = 'alertas';

    public function informeEducador():BelongsTo{
        return $this->belongsTo(InformeEducador::class, 'id_informe_educador');
    }
}
