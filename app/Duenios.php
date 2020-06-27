<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duenios extends Model
{
    //protected $guarded =[];
    protected $fillable = ['ci','name','lastname','address','phone','email','genero'];
        protected $table  = 'duenios';

        public function scopeName($query,$name)
    {
       if(trim($name)!="")
       {
           $query->where(\DB::raw("CONCAT(name,'',lastname)"),"LIKE","%$name%");
       }
    }
}
