<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Conteudo extends Model
{
    //
    protected $table = 'conteudos';

    protected $fillable = [
        'titulo',
        'conteudo',
        'disciplina_id'
    ];

    public function disciplina()
    {
        return $this->belongsTo('App\Model\Disciplina','disciplina_id');
    }
}
