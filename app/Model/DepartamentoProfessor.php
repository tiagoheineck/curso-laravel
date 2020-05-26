<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DepartamentoProfessor extends Model
{
    protected $table = 'departamentos_professores';

    protected $fillable = [
        'departamento_id',
        'professor_id'
    ];

    public $timestamps = false;

    public function professor()
    {
        return $this->belongsTo('App\Model\Professor');
    }
    
    public function departamento()
    {
        return $this->belongsTo('App\Model\Departamento');
    }

    public function professores()
    {
        return $this->belongsToMany(
            'App\Model\Professor',
            'departamentos_professores',
            'departamento_id',
            'professor_id'
        );
    }

    public function departamentos()
    {
        return $this->belongsToMany(
            'App\Model\Departamento',
            'departamentos_professores',
            'departamento_id',
            'professor_id'
        );
    }
}
