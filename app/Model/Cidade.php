<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cidade extends Model
{
       use SoftDeletes;

       protected $fillable = [
           'nome'
       ];

       protected $table = 'cidades';

       public function cursos()
       {
           return $this->hasMany('App\Model\Curso','cidade_id');
       }
}
