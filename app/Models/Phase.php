<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'phases';

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
    protected $fillable = ['titre', 'video', 'numero', 'temps', 'activated', 'finish', 'cours_id', 'created_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function cours()
    {
        return $this->belongsTo('App\Models\Cours');
    }
    public function comments()
    {
        return $this->hasMany(Commentaire::class);
    }

}
