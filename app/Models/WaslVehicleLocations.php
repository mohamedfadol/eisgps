<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaslVehicleLocations extends Model
{
    use HasFactory;
    protected $table="wasl_vehicle_locations";
    protected $primaryKey="id";
    protected $fillable=[
        'traccar_id',
        'traccar_vehicle_id',
        'wasl_result',
    ];
}
