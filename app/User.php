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

    protected $with = [ 'skills' ];


    public function hasRole( $role )
    {
        return $this->role == $role;
    }

    public function createdJobs()
    {
        return $this->hasMany(Job::class, 'contractor_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'freelancer_id');
    }


    public function album()
    {
        return $this->hasMany(Album::class);
    }

    public function contactInformation()
    {
        return $this->hasOne(ContactInformation::class)->withDefault();
    }

    public function updateContactInformation( $contact )
    {
        $this->contactInformation()->updateOrCreate([ 'user_id' => $this->id ], $contact);
        return $this;
    }

    public function isProfileCompleted()
    {
        return $this->contactInformation->address != null and $this->contactInformation->city != null and $this->contactInformation->country and $this->contactInformation->contact_number;
    }

    public function profile()
    {
        return '/profiles/' . $this->id;
    }

    public function avatar()
    {
        return $this->avatar_path ?: 'images/person-2.jpg';
    }

    public function skills()
    {
        return $this->belongsToMany('App\Skill');
    }

    public function messagesR()
    {
        return $this->hasMany(Chat::class,'receiverId','id');
    }

    public function messageS()
    {
        return $this->hasMany(Chat::class,'senderId','id');
    }
}
