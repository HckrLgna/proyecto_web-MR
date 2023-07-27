<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FichaClinica extends Model
{
    use HasFactory;
    protected $table = 'ficha_clinica';

    public function beneficiario(): BelongsTo{
        return $this->belongsTo(Beneficiario::class,'id_beneficiario','id');
    }
}
