<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	public function getRouteKeyName() {
		return 'slug';
	}

	public function jobs() {
		return $this->hasMany( Job::class );
	}
}
