<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class FilterAttribute extends Model
{
    public function group()
    {
        return $this->belongsTo(FilterGroup::class);
    }
}
