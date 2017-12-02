<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany( PortfolioImage::class );
    }
}
