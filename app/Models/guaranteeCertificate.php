<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class guaranteeCertificate extends Model
{
    protected $fillable = [
        'id_guarantee', 'start_day', 'end_day', 'user_id', 'service_id', 'doctor_id', 'tooth_unit', 'note',
        'image_before', 'image_doing', 'image_complete'
    ];
}
