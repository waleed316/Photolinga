<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $guarded = [];


    /**
     * The relationships to always eager load
     *
     * @var array
     */
    protected $with = [ 'owner', 'job' ];

    public function job()
    {
        return $this->belongsTo('App\Job');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function isAwarded()
    {
        return $this->job->awarded_proposal_id == $this->id;
    }

    public function path()
    {
        return '/proposals/' . $this->id;
    }
}
