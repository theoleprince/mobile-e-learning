<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userformation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'userformation';

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
    protected $fillable = ['od', 'formation_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function formation()
    {
        return $this->belongsTo('App\Models\Formation');
    }

}
