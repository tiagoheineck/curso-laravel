<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cidade extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cidades';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    // protected $primaryKey = 'flight_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome'];

    public function cursos(){
        return $this->hasMany('App\Curso', 'cidade_id');
    }
}
