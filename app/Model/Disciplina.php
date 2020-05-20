<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

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
    }
}
