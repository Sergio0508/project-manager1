<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $fillable = ['id','name','precio','tipo','stock','foto'];
    protected $table='productos';
}
