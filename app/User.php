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
        return $this->hasMany(Job::class, 'contractor_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'freelancer_id');
    }

    public function portfolio()
    {
        return $this->hasMany(Portfolio::class);
    }

    public function contactInformation()
    {
        return $this->hasOne(ContactInformation::class)->withDefault();
    }

    public function updateContactInformation( $contact )
    {
        $this->contactInformation()->updateOrCreate([ 'user_id' => $this->id ], $contact);
//        if ( $this->contactInformation != null ) {
//            $this->contactInformation->save();
//        } else {
//        $contactInformation = new ContactInformation();
//        $contactInformation->skype = $contact['skype'];
//        $contactInformation->contact_number = $contact['contact_number'];
//        $contactInformation->address = $contact['address'];
//        $contactInformation->city = $contact['city'];
//        $contactInformation->country = $contact['country'];
//        $this->contactInformation()->save($contactInformation);
////        }
//
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
}
