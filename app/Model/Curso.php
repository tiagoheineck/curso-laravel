<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';

    protected $fillable = [
        'nome','cidade_id'
    ];

    public $timestamps = false;

    public function cidade()
    {
        return $this->belongsTo('App\Model\Cidade','cidade_id');
    }
}
