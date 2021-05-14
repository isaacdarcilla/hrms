<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Scholarship extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('scholarship_number', 'like', '%'.$search.'%');
        });
    }
}
