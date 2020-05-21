<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';

    protected $fillable = [
        'nome','cidade_id', 'departamento_id'
    ];

    public $timestamps = false;

    public function cidade()
    {
        return $this->belongsTo('App\Model\Cidade','cidade_id');
    }

    public function departamento(){
        return $this->belongsTo('App\Model\Departamento','departamento_id');
    }
}
