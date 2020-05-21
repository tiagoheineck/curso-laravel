<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    use SoftDeletes;

    protected $table = 'departamentos';
    protected $fillable = [
        'nome'
    ];

    public function cursos(){
        return $this->hasMany('App\Model\Curso','departamento_id');
    }
}
