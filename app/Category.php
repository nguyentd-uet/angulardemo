<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'categories';

    public function items()
    {
    	return $this->hasMany('App\Item', 'category_id');
    }
}
