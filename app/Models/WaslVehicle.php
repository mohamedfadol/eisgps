<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaslVehicle extends Model
{
    use HasFactory;

    protected $table="wasl_vehicles";
    protected $primaryKey="id";
    protected $fillable=[
        'traccar_id',
        'traccar_device_id',
        'wasl_vehicle_id',
        'imei',
    ];
}
