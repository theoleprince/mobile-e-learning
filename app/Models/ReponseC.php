<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReponseC extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reponse_cs';

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
    protected $fillable = ['reponse', 'commentaire_id', ' created_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function commentaire()
    {
        return $this->belongsTo('App\Models\Commentaire');
    }

}
