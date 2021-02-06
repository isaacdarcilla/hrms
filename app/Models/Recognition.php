<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Recognition extends Model
{
    use SoftDeletes;

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
