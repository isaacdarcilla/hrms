<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'contact_id',
        'office_id',
        'type',	
        'age',	
        'position',	
        'salary_grade',	
        'monthly_salary',	
        'annual_salary',
        'tenure_of_employment',	
        'professional_licensure_passed',
        'bachelors_degree',	
        'bachelors_specialization',	
        'masters_degree',	
        'masters_specialization',
        'masters_units_earned',	
        'doctorate_degree',	
        'doctorate_specialization',	
        'doctorate_units_earned',	
        'name_of_school',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
