<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cours';

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
    protected $fillable = ['nom', 'temps', 'numero', 'activated', 'finish', 'formation_id', 'created_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function formation()
    {
        return $this->belongsTo('App\Models\Formation');
    }
    
}
