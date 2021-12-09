<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursUsers extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cours_users';

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
    protected $fillable = ['user_id', 'formation_id', 'cours_id', 'finish', 'evaluated'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function cour()
    {
        return $this->belongsTo('App\Models\Cour');
    }
    public function formation()
    {
        return $this->belongsTo('App\Models\Formation');
    }

}
