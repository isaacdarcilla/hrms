<?php

namespace App\Models;

class Account extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
}
