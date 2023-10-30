<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = [
        'traccar_id',
        'basicAuth',
        'name',
        'email',
        'password',
        'mobile',
        'birthday',
        'address',
        'addressNo',
        'city',
        'state',
        'zipCode',
        'mapLayer',
        'gender',
        'id_number',
        'wassel',
        'authMobileCode',
        'accountType',
        'isAdmin',
        'expiry_date',
        'start_date',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function  Facility()
    {
        return Facility::where('traccar_id',$this->traccar_id)->first();
    }

    public function MobileCode(){
        $auth  =(int)(rand(1,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9));
        $mobileCodeCheck = User::where('authMobileCode',$auth)->first();
        if($mobileCodeCheck){
            return $this->MobileCode();
        }
        return  $auth;
    }
}
