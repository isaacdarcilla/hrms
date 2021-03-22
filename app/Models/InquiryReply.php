<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class InquiryReply extends Model
{
    use SoftDeletes;

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class);
    }
}
