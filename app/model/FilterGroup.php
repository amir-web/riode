<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class FilterGroup extends Model
{
    public function attrs()
    {
        return $this->hasMany(FilterAttribute::class, 'group_id');
    }
}
