<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Psipop extends Model
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

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('item_number', 'like', '%'.$search.'%')
                  ->orWhere('position', 'like', '%'.$search.'%')
                  ->orWhere('tin_number', 'like', '%'.$search.'%')
                  ->orWhere('incumbent_name', 'like', '%'.$search.'%')
                  ->orWhere('salary_grade', 'like', '%'.$search.'%')
                  ->orWhere('sex', 'like', '%'.$search.'%')
                  ->orWhere('filled_position', 'like', '%'.$search.'%');
        });
    }
}
