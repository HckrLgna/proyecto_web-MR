<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Beneficiario extends Model
{
    use HasFactory;

    public function fichasClinicas(): HasMany{
        return $this->hasMany(FichaClinica::class);
    }
    public function informesAcademicos(): HasMany{
        return $this->hasMany(InformeAcademico::class);
    }
    public function datosIngreso(): HasMany{
        return $this->hasMany(DatosIngreso::class, 'id_beneficiario', 'id');
    }
    public function informesEducadores():HasMany{
        return $this->hasMany(InformeEducador::class,'id_beneficiario','id');
    }
    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }
}
