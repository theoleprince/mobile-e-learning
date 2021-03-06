<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];

    public function permissions() {
        return $this->belongsToMany('App\Permission');
    }
}
