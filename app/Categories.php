<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Categories extends Model
{
    protected $guarded = [];

    use NodeTrait;

    public function faqs()
    {
        return $this->hasMany('App\FrequentlyAskedQuestion');
    }
}
