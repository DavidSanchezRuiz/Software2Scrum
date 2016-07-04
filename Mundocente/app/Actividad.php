<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividads';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'tipo', 'cargo','enlace','description', 'fecha_inicio', 'fecha_fin', 'users_id','area_id'];
}
