<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    protected $fillable = ['page_name', 'count'];

    // Definir la relación para acceder a la tabla page_views
    protected $table = 'page_views';
}
