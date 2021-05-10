<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;

class Contact extends Model implements AuthenticatableContract, AuthorizableContract
{
    use SoftDeletes, Authenticatable, Authorizable;

    protected $table = 'contacts';

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function backgrounds()
    {
        return $this->hasMany(Background::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }

    public function recognitions()
    {
        return $this->hasMany(Recognition::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }

    public function volunteers()
    {
        return $this->hasMany(Volunteer::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function employee_setting()
    {
        return $this->hasMany(EmployeeSetting::class);
    }

    public function credit()
    {
        return $this->hasMany(Credit::class);
    }

    public function service_record()
    {
        return $this->hasMany(ServiceRecord::class);
    }

    public function reference()
    {
        return $this->hasMany(Reference::class);
    }

    public function government()
    {
        return $this->hasMany(GovernmentId::class);
    }

    public function ctocredit()
    {
        return $this->hasMany(CtoCredit::class);
    }

    public function inquiry()
    {
        return $this->hasMany(Inquiry::class);
    }

    public function ipcr()
    {
        return $this->hasMany(IpcrOpcr::class);
    }

    public function offices()
    {
        return $this->hasMany(Office::class);
    }

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }

    public function psipop()
    {
        return $this->hasMany(Psipop::class);
    }

    public function service_records()
    {
        return $this->hasMany(ServiceRecord::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function getNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function scopeOrderByName($query)
    {
        $query->orderBy('last_name')->orderBy('first_name');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('first_name', 'like', '%'.$search.'%')
                    ->orWhere('last_name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->orWhere('agency_employee_id', 'like', '%'.$search.'%')
                    ->orWhereHas('organization', function ($query) use ($search) {
                        $query->where('name', 'like', '%'.$search.'%');
                    });
            });
        })->when($filters['trashed'] ?? null, function ($query, $trashed) {
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            }
        });
    }
}
