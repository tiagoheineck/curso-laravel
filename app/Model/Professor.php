<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professor extends Model {

    use SoftDeletes;

    //If you don not create the classes in pure English,
    //you need to confirm the plural classe's name
    protected $table = 'professores';

    //Here you set which fields can be filled by a seeder or factory (to avoid mass assignment vulnerability)
    protected $fillable = [
        'nome'
    ];

    //One professor has many matters
    //One matter has many professors
    public function disciplinas() {
        return $this->hasMany('App\Model\Disciplina','professor_id');
    }

    //Mapping many to many relationship
    public function departamentos(){
      return $this->belongsToMany(
        'App\Model\Departamento',
        'departamentos_professores',
        'professor_id',
        'departamento_id'
      );
    }

}
