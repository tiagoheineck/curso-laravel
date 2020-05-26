<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professor extends Model
{
    use SoftDeletes;

    protected $table = 'professores';

    protected $fillable = [
        'nome','user_id'
    ];

    public function disciplinas()
    {
        return $this->hasMany('App\Model\Disciplina','professor_id');
    }
    
}
