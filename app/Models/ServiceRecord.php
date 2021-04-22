<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceRecord extends Model
{
    use SoftDeletes;

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
