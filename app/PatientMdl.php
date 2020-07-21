<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientMdl extends Model
{
    protected $fillable = [
        'patients_name',
        'patients_age',
        'patients_inv_date',
        'refd_doctor',
    ];
}
