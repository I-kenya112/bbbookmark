<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function links()
    {
        return $this->belongsToMany(Link::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
