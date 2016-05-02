<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class creation extends Model
{
    protected $table = 'creations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['actividad_id','area_id','users_id'];
}
