<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nombre extends Model
{
    //

    protected $table="nombres";
    protected $fillable=["nombre","edad"];
}
