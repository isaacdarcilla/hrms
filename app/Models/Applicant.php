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

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('first_name', 'like', '%'.$search.'%');
        })->when($filters['trashed'] ?? null, function ($query, $trashed) {
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            }
        });
    }
}
