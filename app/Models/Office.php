<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Office extends Model
{
    use SoftDeletes;

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function psipop()
    {
        return $this->hasMany(Psipop::class);
    }

    public function offices()
    {
        return $this->hasMany(Scholarship::class);
    }
}
