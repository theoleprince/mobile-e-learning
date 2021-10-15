<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'commentaires';

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
    protected $fillable = ['commentaire', 'phase_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function phase()
    {
        return $this->belongsTo('App\Models\Phase');
    }
    
}
