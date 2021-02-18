<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Applicant extends Model
{
    use SoftDeletes;

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
