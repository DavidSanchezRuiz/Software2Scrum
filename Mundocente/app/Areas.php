<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
     protected $table = 'areas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
