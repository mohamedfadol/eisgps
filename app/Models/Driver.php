<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $table="drivers";
    protected $primaryKey = "id";
    protected $fillable=[
        'birthday',
        'gender',
        'email',
        'phone',
        'nationality',
        'id_number',
        'licence_type',
        'date_licence',
        'exp_date_licence',
        'traccar_driver_id',
        'traccar_device_id',
        'owner_id',

    ];


    public function Owner()
    {
        $usr = User::find($this->owner_id);
        if($usr){
            if($usr->accountType == 2){
                return $usr->name;
            }else{
                $company = Facility::where('owner_id',$this->owner_id)->first();
                return $company->manager_name;
            }
        }else{
            return null;
        }
    }
}
