<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Reservas extends Model
{
    //
    protected $fillable = ['id','duenio_id','id_animales','phone','date'];
    protected $table  = 'reservas';

    public function scopeName($query,$date)
    {
       if(trim($date)!="")
       {
           $query->where(\DB::raw("CONCAT(date,'',duenio_id)"),"LIKE","%$date%");
       }
    }
    
}
