<?php

namespace App\Http\Controllers;

use App\Models\Devices;
use App\Models\Driver;
use App\Models\Facility;
use App\Models\Groups;
use App\Models\Simcards;
use App\Models\User;
use App\Models\Vehicle;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $list = [];
        $data = Facility::all();
        foreach($data as $item){
            $usr = User::where('traccar_id',$item->traccar_id)->first();
            if($usr){
                $item->start_date = $usr->start_date;
                $item->expiry_date = $usr->expiry_date;

                $client = new Client();
                $res = $client->request('GET', env('TRACCAR_API')."/users/".$usr->traccar_id,
                    [
                        'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
                    ]);

                $response =  $res->getBody()->getContents();
                $data = json_decode($response);


                $item->disabled = $data->disabled;


            }

            if($usr->accountType == 1){
                $list[]= $item;
            }


        }

        return response()->json([
            'success' => true,
            'data'=>$list,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                "user.fullname" => 'required',
                "user.account_type" => 'required',
                "user.email" => 'required',
                "user.phone" => 'required|unique:users,mobile',
                "user.birthday" => 'required_if:user.wassel,true',
                "user.ident_number" => 'required_if:user.account_type,2',
                "company.num_at_ministry" => 'required_unless:user.account_type,2',
                "company.commercial_register_date_issuance" => 'required_unless:user.account_type,2',
                "company.ident_number" => 'required_unless:user.account_type,2',
                "company.phone" => 'required_unless:user.account_type,2',
                "company.email" => 'required_unless:user.account_type,2',
                "company.manager_name" => 'required_unless:user.account_type,2',
                "company.manager_phone" => 'required_unless:user.account_type,2',
                "company.manager_mobile" => 'required_unless:user.account_type,2',

            ],[
                'user.fullname.required' => Lang::get('errors.fullname',[],$request->lang),
                'user.email.required' => Lang::get('errors.email',[],$request->lang),
                'user.phone.required' => Lang::get('errors.phone_number',[],$request->lang),
                'user.birthday.required' => Lang::get('errors.bithday_hijri',[],$request->lang),
                'user.account_type.required' => Lang::get('errors.account_type',[],$request->lang),
                'user.ident_number.required_if' => Lang::get('errors.ident_number',[],$request->lang),
                'company.num_at_ministry.required_unless' => Lang::get('errors.num_at_ministry',[],$request->lang),
                'company.commercial_register_date_issuance.required_unless' => Lang::get('errors.commercial_register_date_issuance',[],$request->lang),
                'company.ident_number.required_unless' => Lang::get('errors.ident_number',[],$request->lang),
                'company.phone.required_unless' => Lang::get('errors.phone_number',[],$request->lang),
                'company.email.required_unless' => Lang::get('errors.email',[],$request->lang),
                'company.manager_name.required_unless' => Lang::get('errors.manager_name',[],$request->lang),
                'company.manager_phone.required_unless' => Lang::get('errors.manager_phone',[],$request->lang),
                'company.manager_mobile.required_unless' => Lang::get('errors.manager_mobile',[],$request->lang),

            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()->first()]);
        }


        //  dd($request->all());
//        //TODO check about password

        //Add User
        $password = "123456";
        $client = new Client();

        $props = [];
        foreach ($request->user['properties'] as $prop){
            $props[$prop['name']] = $prop['value'];

        }




        $body = [
            'name'=>$request->user['fullname'],
            'email'=>$request->user['email'],
            'phone'=>$request->user['phone'] ?? null,
            'readonly'=>$request->user['readOnly'],
            'deviceReadonly'=>$request->user['deviceReadOnly'],
            'administrator'=>$request->user['isAdmin'],
            'map'=>'custom',
            'disabled'=>$request->user['isDisabled'],
            'latitude'=>$request->user['lat'],
            'longitude'=>$request->user['long'],
            'zoom'=>$request->user['approximation'],
            'password'=>$password,
            'twelveHourFormat'=>$request->user['twelveHour'],
            'coordinateFormat'=>$request->user['coordinate_format'] ?? null,
            'poiLayer'=>$request->user['pol'],
            'limitCommands'=>$request->user['limitCommands'] ,
            'deviceLimit'=>$request->user['max_devices'] ?? -1,
            'userLimit'=>$request->user['max_users'] ?? 0,
            'expirationTime'=>$request->user['expiry_date'] ?? null,
            'token'=>md5(uniqid(rand(), true)),
            'attributes'=> $props
        ];
        try{
            $res = $client->request('POST', env('TRACCAR_API')."/users",
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth,'Content-Type' => 'application/json'],
                    'body'    => json_encode($body)

                ]);

            $response =  $res->getBody()->getContents();
            $userData = json_decode($response);


            $user = new User();
            $user->traccar_id = $userData->id;
            $user->name = $request->user['fullname'];
            $user->email = $request->user['email'];
            $user->mobile = $request->user['phone'] ?? null;
            $user->birthday = $request->user['birthday'] ?? null;
            $user->address = $request->user['address'] ?? null;
            $user->addressNo = $request->user['addressNo'] ?? null;
            $user->city = $request->user['city'] ?? null;
            $user->state = $request->user['state'] ?? null;
            $user->zipCode = $request->user['zipCode'] ?? null;
            $user->mapLayer = $request->user['maplayer'] ?? null;
            $user->id_number = $request->user['ident_number'] ?? null;
            $user->wassel =  $request->user['wassel'] ?? false;
            $user->accountType = (int)$request->user['account_type'];
            $user->gender = $request->user['user_gender'] ?? null;
            $user->expiry_date = $request->user['expiry_date'] ?? null;
            $user->start_date = $request->user['start_date'] ?? null;
            $user->basicAuth =  base64_encode($request->user_email.":".$password);
            $user->save();

            //Add facility
            if($request->user['account_type'] != "2"){
                $facility = new Facility();
                $facility->number_at_ministry = $request->company['num_at_ministry'] ;
                $facility->commercial_register_number = $request->company['commercial_reg_number'] ?? null;
                $facility->commercial_register_start_date = $request->company['commercial_register_date_issuance'] ?? null;
                $facility->commercial_register_end_date = $request->company['commercial_reg_expiry_date'] ?? null;
                $facility->full_name_ar = $request->company['full_name_ar'] ?? null;
                $facility->full_name_en = $request->company['full_name_en'] ?? null;
                $facility->short_name_ar = $request->company['short_name_ar'] ?? null;
                $facility->short_name_en = $request->company['short_name_en'] ?? null;
                $facility->address = $request->company['address'] ?? null;
                $facility->city = $request->company['city'] ?? null;
                $facility->mail_box = $request->company['email'] ?? null;
                $facility->post_code = $request->company['zipCode'] ?? null;
                $facility->phone = $request->company['phone'] ?? null;
                $facility->fax = $request->company['fax'] ?? null;
                $facility->website = $request->company['website'] ?? null;
                $facility->manager_name = $request->company['manager_name'] ?? null;
                $facility->manager_phone = $request->company['manager_phone'] ?? null;
                $facility->manager_mobile = $request->company['manager_mobile'] ?? null;
                $facility->manager_mail = $request->company['manager_email'] ?? null;
                $facility->id_number = $request->company['ident_number'] ?? null;
                $facility->veh_rental_management_service = $request->company['veh_rental_management_service'] ?? false;
                $facility->veh_maintenance_service = $request->company['veh_maintenance_service'] ?? false;
                $facility->veh_tracking_service = $request->company['veh_tracking_service'] ?? false;
                $facility->traccar_id  = $userData->id;
                $facility->owner_id  = $user->id;
                $facility->save();
            }



            return response()->json([
                'success' => true,
                'userId' => $userData->id,
                'message'=>Lang::get('valid.new_data_added',[],$request->lang),

            ]);

        }catch (\Throwable $exception){
            return response()->json([
                'success' => false,
                'message'=>Lang::get('errors.failed',[],$request->lang),
                'error'=>$exception->getMessage()
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $data = Facility::find($id);

        $usr = User::where('traccar_id',$data->traccar_id)->first();
        if($usr){
            $data->start_date = $usr->created_at;
            $data->expiration_date = $usr->expiration_date;
        }

        return response()->json([
            'success' => true,
            'data'=>$data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $facility)
    {
        //
    }


    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),
            [

                "num_at_ministry" => 'required',
                "commercial_register_date_issuance" => 'required',
                "ident_number" => 'required',
                "phone" => 'required',
                "email" => 'required',
                "manager_name" =>'required',
                "manager_phone" => 'required',
                "manager_mobile" => 'required',

            ],[

                'num_at_ministry.required' => Lang::get('errors.num_at_ministry',[],$request->lang),
                'commercial_register_date_issuance.required' => Lang::get('errors.commercial_register_date_issuance',[],$request->lang),
                'ident_number.required' => Lang::get('errors.ident_number',[],$request->lang),
                'phone.required' => Lang::get('errors.phone_number',[],$request->lang),
                'email.required' => Lang::get('errors.email',[],$request->lang),
                'manager_name.required' => Lang::get('errors.manager_name',[],$request->lang),
                'manager_phone.required' => Lang::get('errors.manager_phone',[],$request->lang),
                'manager_mobile.required' => Lang::get('errors.manager_mobile',[],$request->lang),

            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()->first()]);
        }

        try {
            $facility = Facility::find($id);
            $facility->number_at_ministry = $request->num_at_ministry ;
            $facility->commercial_register_number = $request->commercial_reg_number ?? null;
            $facility->commercial_register_start_date = $request->commercial_register_date_issuance ?? null;
            $facility->commercial_register_end_date = $request->commercial_reg_expiry_date ?? null;
            $facility->full_name_ar = $request->full_name_ar ?? null;
            $facility->full_name_en = $request->full_name_en ?? null;
            $facility->short_name_ar = $request->short_name_ar ?? null;
            $facility->short_name_en = $request->short_name_en ?? null;
            $facility->address = $request->address ?? null;
            $facility->city = $request->city ?? null;
            $facility->mail_box = $request->email ?? null;
            $facility->post_code = $request->zipCode ?? null;
            $facility->phone = $request->phone ?? null;
            $facility->fax = $request->fax ?? null;
            $facility->website = $request->website ?? null;
            $facility->manager_name = $request->manager_name ?? null;
            $facility->manager_phone = $request->manager_phone ?? null;
            $facility->manager_mobile = $request->manager_mobile ?? null;
            $facility->manager_mail = $request->manager_email ?? null;
            $facility->id_number = $request->ident_number ?? null;
            $facility->veh_rental_management_service = $request->veh_rental_management_service ?? false;
            $facility->veh_maintenance_service = $request->veh_maintenance_service ?? false;
            $facility->veh_tracking_service = $request->veh_tracking_service ?? false;
            $facility->save();
            return response()->json([
                'success' => true,
                'message'=> Lang::get('valid.updated',[],$request->lang),
            ]);
        }catch (\Throwable $exception){
            return response()->json([
                'success' => false,
                'message'=>Lang::get('errors.failed',[],$request->lang),
                'error'=>$exception->getMessage(),
            ]);
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        //
    }

    public function newEntry(Request $request)
    {

        $validator = Validator::make($request->all(),
            [

                "device.device_name" => 'required',
                "device.imei" => 'required',
                "simCard.telecom_company" => 'required',
                "simCard.sim_card" => 'required',
                "vehicle.plate_number" => 'required',
                "vehicle.vehicle_serial_number" => 'required',
                "vehicle.plate_type" => 'required',
                "driver.driver_id_number" => 'required',
                "driver.driver_birthday" => 'required',
                "driver.driver_mobile" => 'required',
                "driver.full_name" => 'required',
            ],[

                'device.device_name.required' => Lang::get('errors.device_name',[],$request->lang),
                'device.imei.required' => Lang::get('errors.imei',[],$request->lang),
                'simCard.telecom_company.required' => Lang::get('errors.telecom_company',[],$request->lang),
                'simCard.sim_card.required' => Lang::get('errors.sim_card',[],$request->lang),
                'vehicle.plate_number.required' => Lang::get('errors.plate_number',[],$request->lang),
                'vehicle.vehicle_serial_number.required' => Lang::get('errors.vehicle_serial_number',[],$request->lang),
                'vehicle.plate_type.required' => Lang::get('errors.plate_type',[],$request->lang),
                'driver.driver_id_number.required' => Lang::get('errors.ident_number',[],$request->lang),
                'driver.driver_birthday.required' => Lang::get('errors.driver_birthday',[],$request->lang),
                'driver.driver_mobile.required' => Lang::get('errors.driver_mobile',[],$request->lang),
                'driver.full_name.required' => Lang::get('errors.driver_full_name',[],$request->lang),
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()->first()]);
        }

        try {

            $localUser = User::where('traccar_id',$request->theUser)->first();
            //Add group if exist
            if(isset($request->device['device_branch'])){

                $body3 = [
                    'name'=>$request->device['device_branch']
                ];
                $client = new Client();
                $res = $client->request('POST', env('TRACCAR_API')."/groups",
                    [
                        'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth,'Content-Type' => 'application/json'],
                        'body'    => json_encode($body3)

                    ]);

                $response =  $res->getBody()->getContents();
                $groupData = json_decode($response);

                $gr = new Groups();
                $gr->traccar_group_id = $groupData->id;
                $gr->owner_id = $localUser->id;
                $gr->save();
            }



            //Add device
            $props2 =  [];
            foreach ($request->device['attributes'] as $prop){
                $props2[$prop['name']] = $prop['value'];
            }

            $body2 = [

                'name'=> $request->device['device_name'],
                'uniqueId'=> $request->device['imei'],
                'status'=> 'offline',
                'disabled' => false,
                'phone' => $request->simCard['sim_card'] ?? null,
                'groupId'=> $groupData->id ?? 0,
                'model'=> $request->device['device_model'] ?? null,
                'category'=> $request->device['device_category'] ?? null,

                'attributes'=> $props2
            ];
            $client = new Client();
            $res = $client->request('POST', env('TRACCAR_API')."/devices",
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth,'Content-Type' => 'application/json'],
                    'body'    => json_encode($body2)

                ]);

            $response =  $res->getBody()->getContents();
            $deviceData = json_decode($response);

            $sim = Simcards::where('iccid',$request->simCard['sim_card'])->first();
            $sim->device_id = $request->device['imei'];
            $sim->save();

            $device = new Devices();
            $device->traccar_device_id = $deviceData->id;
            $device->owner_id =  $localUser->id;

            //link device to user
            $body = [
                'userId'=> $request->theUser,
                'deviceId'=> $deviceData->id,
            ];
            $client = new Client();
            $res = $client->request('POST', env('TRACCAR_API')."/permissions",
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth,'Content-Type' => 'application/json'],
                    'body'    => json_encode($body)

                ]);

            $response =  $res->getBody()->getContents();
            $permissionData = json_decode($response);

            //Add Vehicle

            $vehicle = new Vehicle();
            $vehicle->code = $request->vehicle['vehicle_code'] ?? null ;
            $vehicle->plate_number = $request->vehicle['plate_number'] ;
            $vehicle->type = $request->vehicle['insurance_type'] ?? null ;
            $vehicle->manufacture = $request->vehicle['manufacture_company'] ?? null ;
            $vehicle->model = $request->vehicle['vehicle_model'] ?? null ;
            $vehicle->manufacture_year = $request->vechile['manufacturing_year'] ?? null ;
            $vehicle->color = $request->vehicle['vehicle_color'] ?? null ;
            $vehicle->counter = $request->vehicle['current_counter_reader'] ?? null ;
            $vehicle->fuel_type = $request->vehicle['fuel_type'] ?? null ;
            $vehicle->fuel_cost = $request->vehicle['fuel_cost'] ?? null ;
            $vehicle->fuel_consumption = $request->vehicle['fuel_cons_liters'] ?? null ;
            $vehicle->tank_capacity = $request->vehicle['tank_capacity'] ?? null ;
            $vehicle->plate_type = $request->vehicle['plate_type'] ?? null ;
            $vehicle->insurance_type = $request->vehicle['insurance_company'] ?? null ;
            $vehicle->insurance_number = $request->vehicle['insurance_number'] ?? null ;
            $vehicle->serial_number = $request->vehicle['vehicle_serial_number'] ?? null ;
            $vehicle->exp_library = $request->vehicle['date_exp_library_form'] ?? null ;
            $vehicle->exam_date = $request->vehicle['history_periodic_exam'] ?? null ;
            $vehicle->structure_number = $request->vehicle['structure_no'] ?? null ;
            $vehicle->engine_serial_number = $request->vehicle['engine_serial_number'] ?? null ;
            $vehicle->purchase_date = $request->vehicle['purchase_date'] ??  null ;
            $vehicle->storage_box_capacity = $request->vehicle['storage_box_capacity'] ?? null ;
            $vehicle->doors_number = $request->vehicle['number_doors'] ?? null ;
            $vehicle->seats_number = $request->vehicle['seats_number'] ?? null ;
            $vehicle->motion_vector = $request->vehicle['motion_vector'] ?? null ;
            $vehicle->supplier = $request->vehicle['supplier'] ?? null ;
            $vehicle->start_insurance_date = $request->vehicle['start_insurance_date'] ?? null ;
            $vehicle->end_insurance_date = $request->vehicle['end_insurance_date'] ?? null ;
            $vehicle->command_status = $request->vehicle['command_status'] ?? 0 ;
            $vehicle->traccar_device_id = $deviceData->id ;
            $vehicle->owner_id =  $localUser->id;
            $vehicle->save();


            //Add Driver

            $body5 = [
                'name'=> $request->driver['full_name'],
                'uniqueId'=> $request->driver['driver_id_number'],
            ];
            $client = new Client();
            $res = $client->request('POST', env('TRACCAR_API')."/drivers",
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth,'Content-Type' => 'application/json'],
                    'body'    => json_encode($body5)

                ]);

            $response =  $res->getBody()->getContents();
            $driverData = json_decode($response);

            $driver = new Driver();

            $driver->birthday=$request->driver['driver_birthday'] ?? null ;
            $driver->gender=$request->driver['driver_gender'] ?? null;
            $driver->email=$request->driver['driver_email'] ?? null;
            $driver->phone = $request->driver['driver_mobile'] ?? null;
            $driver->nationality = $request->driver['driver_nationality'] ?? null;
            $driver->licence_type = $request->driver['driver_licence_type'] ?? null;
            $driver->date_licence = $request->driver['driver_date_issuance'] ?? null;
            $driver->exp_date_licence = $request->driver['driver_license_expiration'] ?? null;
            $driver->id_number = $request->driver['driver_id_number'] ?? null;
            $driver->traccar_driver_id = $driverData->id ;
            $driver->traccar_device_id =$deviceData->id ;
            $driver->owner_id =  $localUser->id ;
            $driver->save();


            //link driver to user
            $body = [
                'userId'=> $request->theUser,
                'driverId'=> $driverData->id,
            ];
            $client = new Client();
            $res = $client->request('POST', env('TRACCAR_API')."/permissions",
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth,'Content-Type' => 'application/json'],
                    'body'    => json_encode($body)

                ]);

            $response =  $res->getBody()->getContents();
            $permissionData = json_decode($response);


            //link driver to device
            $body = [
                'deviceId'=> $deviceData->id,
                'driverId'=> $driverData->id,
            ];
            $client = new Client();
            $res = $client->request('POST', env('TRACCAR_API')."/permissions",
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth,'Content-Type' => 'application/json'],
                    'body'    => json_encode($body)

                ]);

            $response =  $res->getBody()->getContents();
            $permissionData = json_decode($response);

            return response()->json([
                'success' => true,
                'message'=>Lang::get('valid.new_data_added',[],$request->lang),

            ]);

        }catch (\Throwable $exception){
            return response()->json([
                'success' => false,
                'message'=>Lang::get('errors.failed',[],$request->lang),
                'error'=>$exception->getMessage()
            ]);
        }

    }
}
