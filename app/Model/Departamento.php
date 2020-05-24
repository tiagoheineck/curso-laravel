<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model {

    //If you don not create the classes in pure English,
    //you need to confirm the plural classe's name
    protected $table = 'departamentos';

    protected $fillable = [
        'nome',
        'chefe_id'
    ];

    public function chefe(){
      return $this->belongsTo('App\Model\Professor');
    }

    //Mapping many to many relationship
    public function professores(){
      return $this->belongsToMany(
        'App\Model\Professor',
        'departamentos_professores',
        'departamento_id',
        'professor_id'
      );
    }
}
