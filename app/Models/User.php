<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'ci',
        'estado',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    //relaciones
    public function rol(): BelongsTo{
        return $this->belongsTo(Role::class, 'rol_id', 'id');
    }
    public function beneficiarios() :HasMany{
        return $this->hasMany(Beneficiario::class);
    }
    public function informesEducador():HasMany{
        return $this->hasMany(InformeEducador::class);
    }
    public function my_update($request){
        self::update($request->all());
    }
    public function tiempo_permanencia($data_ini){
        // Convertir la fecha inicial a un objeto Carbon
        $fechaInicial = Carbon::parse($data_ini);

        // Obtener la diferencia entre la fecha inicial y la fecha actual
        $intervalo = $fechaInicial->diff(Carbon::now());

        // Obtener los días y horas del intervalo
        $dias = $intervalo->days;
        $horas = $intervalo->h;

        return "El tiempo de permanencia es: $dias Días con: $horas Horas.";
    }
}
