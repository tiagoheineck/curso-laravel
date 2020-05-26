<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Departamento extends Model
{
    protected $table = 'departamentos';

    protected $fillable = [
        'nome',
        'chefe_id'
    ];

    public function chefe()
    {
        return $this->belongsTo('App\Model\Professor');
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
}
