<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'formations';

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
    protected $fillable = ['nom', 'description', 'activated', ' created_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
