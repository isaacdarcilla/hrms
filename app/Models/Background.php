<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Background extends Model
{
    use SoftDeletes;

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function childrens()
    {
        return $this->hasMany(Children::class);
    }
}
