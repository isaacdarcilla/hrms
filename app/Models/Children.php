<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Children extends Model
{
    use SoftDeletes;

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function background()
    {
        return $this->belongsTo(Background::class);
    }
}
