<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Conteudo extends Model
{
    use SoftDeletes;

    protected $table = 'conteudos'; 
    
    //atributos
    protected $fillable = [        
        'titulo',
        'conteudo',
        'disciplina_id'];

        public function disciplina() {
            return $this->belongsTo('App\Model\Disciplina','disciplina_id');
        }
}
