<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DatosIngreso extends Model
{
    use HasFactory;
    protected $table = 'datos_ingreso';
    public function beneficiario(): BelongsTo{
        return $this->belongsTo(Beneficiario::class, 'id_beneficiario','id');
    }
}
