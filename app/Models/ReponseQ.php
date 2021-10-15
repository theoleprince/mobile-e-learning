<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReponseQ extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reponse_qs';

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
    protected $fillable = ['Reponse', 'note', 'statut', 'finish', 'question_id', ' created_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }

}
