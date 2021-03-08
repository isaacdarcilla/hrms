<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeSetting extends Model
{
    use SoftDeletes;

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
