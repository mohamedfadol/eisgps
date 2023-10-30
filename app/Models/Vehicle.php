<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table="vehicles";
    protected $primaryKey="id";
    protected $fillable=[
        'code',
        'plate_number',
        'type',
        'manufacture',
        'model',
        'manufacture_year',
        'color',
        'counter',
        'fuel_type',
        'fuel_cost',
        'fuel_consumption',
        'tank_capacity',
        'plate_type',
        'insurance_type',
        'serial_number',
        'exp_library',
        'supplier',
        'insurance_number',
        'start_insurance_date',
        'command_status',
        'end_insurance_date',
        'exam_date',
        'structure_number',
        'engine_serial_number',
        'purchase_date',
        'storage_box_capacity',
        'doors_number',
        'seats_number',
        'motion_vector',
        'traccar_device_id',
        'owner_id'

    ];

    public function Owner()
    {
        $usr = User::find($this->owner_id);
        if($usr){
            if($usr->accountType == 2){
                return $usr->name;
            }else{
                $company = Facility::where('owner_id',$this->owner_id)->first();
                return $company->short_name_ar;
            }
        }else{
            return null;
        }
    }
}
