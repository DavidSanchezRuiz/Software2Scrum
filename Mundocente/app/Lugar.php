<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{

	protected $table = 'lugars';


    protected $fillable = ['name', 'tipo', 'lugar_id'];
}
