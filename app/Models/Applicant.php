<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Applicant extends Model
{
    protected $fillable = [
        'bn_name',
        'en_name',
        'mobile',
        'email',
        'date_of_bath',
        'edu_qualification',
        'present_occ',
        'work_place',
        'application_type',
        'permanent_address',
        'journalism_tranning',
        'applicant_photo',
        'district_id',
        'upazila_id',
        'university_name',
        'university_type',
        'present_address',
        'is_seen',
        'shortlist',
    ];

    protected $casts = [
        'date_of_bath' => 'date',
    ];

    public function district(){
        return $this->belongsTo(District::class,'district_id','id');
    }
    public function upazila(){
        return $this->belongsTo(Upazila::class,'upazila_id','id');
    }
}
