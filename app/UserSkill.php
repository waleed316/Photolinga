<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    //
    protected $table = 'skill_user';
    protected $fillable = ['user_id','skill_id'];

}
