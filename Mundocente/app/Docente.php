<?php

namespace Mundocente;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table ="docentes";

    protected $fillable = ['nombre', 'apellido', 'privilegio', 'email', 'numero_tel', 'password', 'id_instituto', 'id_lugar'];
}
