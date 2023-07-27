<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use mysql_xdevapi\Table;

class InformeAcademico extends Model
{
    use HasFactory;
    protected $table = 'informe_academico';
    public function beneficiario(): BelongsTo{
        return $this->belongsTo(Beneficiario::class,'id_beneficiario', 'id');
    }
}
