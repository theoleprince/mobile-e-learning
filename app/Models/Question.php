<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['question', 'nbre_point', 'cours_id', 'created_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function cour()
    {
        return $this->belongsTo('App\Models\Cours');
    }
    
}
