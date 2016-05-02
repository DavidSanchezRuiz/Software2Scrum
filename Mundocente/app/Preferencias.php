<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Preferencias extends Model
{
    protected $table = 'preferencias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['users_email', 'areas_id'];
}
