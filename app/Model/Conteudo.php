<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conteudo extends Model {

    use SoftDeletes;

    //If you don not create the classes in pure English,
    //you need to confirm the plural classe's name
    protected $table = 'conteudos';

    //Here you set which fields can be filled by a seeder or factory (to avoid mass assignment vulnerability)
    protected $fillable = [
        'titulo',
        'disciplina_id'
    ];

    //One professor has many matters
    //One matter has many professors
    public function disciplina() {
        return $this->belongsTo('App\Model\Disciplina', 'disciplina_id');
    }


}
