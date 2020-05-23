<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disciplina extends Model
{
    use SoftDeletes;

    protected $table = 'disciplinas';

    protected $fillable = [
        'nome',
        'carga_horaria',
        'professor_id'
    ];

    public function professor()
    {
        return $this->belongsTo('App\Model\Professor','professor_id');
    }
}
