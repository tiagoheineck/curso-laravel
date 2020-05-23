<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
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
=======

class Disciplina extends Model
{
    protected $table = 'disciplinas';

    protected $fillable = [
        'nome','professor_id'
    ];

    public $timestamps = false;

    public function cidade()
    {
        return $this->belongsTo('App\Model\Disciplina','professor_id');
>>>>>>> features/Diego
    }
}
