<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $table= "facilities";


    protected $fillable = [
        'id',
        'number_at_ministry',
        'commercial_register_number',
        'commercial_register_start_date',
        'commercial_register_end_date',
        'full_name_ar',
        'full_name_en',
        'short_name_ar',
        'short_name_en',
        'address',
        'city',
        'mail_box',
        'post_code',
        'phone',
        'fax',
        'website',
        'manager_name',
        'manager_phone',
        'manager_mobile',
        'manager_mail',
        'id_number',
        'veh_rental_management_service',
        'veh_maintenance_service',
        'veh_tracking_service',
        'traccar_id',
        'owner_id'

    ];


}
