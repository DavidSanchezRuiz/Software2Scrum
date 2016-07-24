<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Creacion extends Model
{
      protected $table = 'creacions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['activity_id', 'area_id'];
}
