<?php

namespace Modules\Categories\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'cod'
    ];
}
