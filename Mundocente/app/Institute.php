<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
     protected $table = 'institutes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
