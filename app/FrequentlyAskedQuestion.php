<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrequentlyAskedQuestion extends Model
{
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsTo('App\Categories');
    }
}
