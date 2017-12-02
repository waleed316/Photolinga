<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'description',
        'avatar_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function hasRole( $role )
    {
        return $this->role == $role;
    }

    public function createdJobs()
    {
        return $this->hasMany( Job::class, 'contractor_id' );
    }

    public function portfolio()
    {
        return $this->hasMany( Portfolio::class );
    }

    public function profile()
    {
        return '/profiles/' . $this->id;
    }

    public function avatar()
    {
        return $this->avatar_path ?: 'images/person-2.jpg';
    }
}
