<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome'
    ];

    protected $table = 'professores';

    public function cursos()
    {
        return $this->hasMany('App\Model\Professor','professor_id');
    }
}
