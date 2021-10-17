<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPermittedInstances(string $model, $permissions, string $keyColumn = 'slug')
    {
        if ($permissions instanceof string) {
            $permissions = [$permissions];
        }
        $teamIds1 = DB::table('role_user')->where('user_id', $this->id)->pluck('team_id')->toArray();
        $teamIds2 = DB::table('permission_user')->where('user_id', $this->id)->pluck('team_id')->toArray();
        $teamIds = array_merge($teamIds1, $teamIds2);

        $tableName = eval('return (new ' . $model . ')->getTable();');

        $slugs = []; // Team name are also product slug
      
        return eval('return ' . $model . '::whereIn($keyColumn, $slugs);');
    }

    function __call($method, $parameters)
    {
        if (Str::startsWith($method, 'getPermitted')) {
            $model = 'App\\' . str_replace('getPermitted', '', $method);
            return $this->getPermittedInstances($model, ...$parameters);
        }

        return parent::__call($method, $parameters);
    }

    public function roles() {
        return $this->belongsToMany('App\Role');
    }
}
