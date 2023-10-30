<?php

namespace App\Http\Controllers;

use App\Models\Devices;
use App\Models\Driver;
use App\Models\Groups;
use App\Models\Simcards;
use App\Models\Vehicle;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;


class DevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        if(auth()->guard('api')->user()->isAdmin == true){
            $url = env('TRACCAR_API')."/devices?all=true";
        }else{
            $url = env('TRACCAR_API')."/devices";
        }


        try {
            $client = new Client();
            $res = $client->request('GET', $url,
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
                ]);

            $response =  $res->getBody()->getContents();
            $data = json_decode($response);

            $onlineDevice = 0;
            $offlineDevice = 0;
            $inertDevice = 0;



            foreach ($data as $dev){



                if($dev->status == 'online'){
                    $onlineDevice+= 1;
                }
                if($dev->status == 'offline'){
                    $offlineDevice += 1;
                }
                if($dev->status == 'unknown'){
                    $inertDevice += 1;
                }

                $device = Devices::where('traccar_device_id',$dev->id)->first();
                if($device){
                    $dev->owner = $device->Owner();
                }else{
                    $dev->owner = null;
                }





            }

            $stat = [
                'onlineDevice' => $onlineDevice,
                'offlineDevice' => $offlineDevice,
                'inertDevice' => $inertDevice,
            ];

            return response()->json([
                'success' => true,
                'data'=>$data,
                'stat'=>$stat
            ]);
        }catch (\Throwable $exception){
            return response()->json([
                'success' => false,
                'error'=>$exception->getMessage(),

            ],500);
        }

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

                "userId" => 'required',
                "user.wassel" => 'required',
                "device.device_name" => 'required',
                "device.imei" => 'required',
                "simCard.sim_card" => 'required',
                "vehicle.plate_number" => 'required',
                "vehicle.vehicle_serial_number" => 'required_if:user.wassel,true',
                "vehicle.plate_type" => 'required',
                "driver.driver_id_number" => 'required_if:user.wassel,true',
                "driver.driver_birthday" => 'required_if:user.wassel,true',
                "driver.driver_mobile" => 'required_if:user.wassel,true',
                "driver.full_name" => 'required_if:user.wassel,true',

            ],[
                'userId.required' => Lang::get('errors.userId',[],$request->lang),
                'device.device_name.required' => Lang::get('errors.device_name',[],$request->lang),
                'device.imei.required' => Lang::get('errors.imei',[],$request->lang),
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
                $gr->owner_id = $request->userId;
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

//            $sim = Simcards::where('iccid',$request->simCard['sim_card'])->first();
//            $sim->device_id = $request->device['imei'];
//            $sim->save();

            $device = new Devices();
            $device->traccar_device_id = $deviceData->id;
            $device->owner_id = $request->userId;

            //link device to user
            $body = [
                'userId'=> $request->userId,
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
            $vehicle->owner_id = $request->userId;
            $vehicle->save();


            //Add Driver
            if(isset($request->driver['full_name']) && isset($request->driver['driver_id_number'])){
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


                $driver->birthday= $request->driver['driver_birthday'] ?? null ;
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
                $driver->owner_id = $request->userId ;
                $driver->save();


                //link driver to user
                $body = [
                    'userId'=> $request->userId,
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
            }


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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $client = new Client();
            $res = $client->request('GET', env('TRACCAR_API')."/devices/".$id,
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
                ]);

            $response =  $res->getBody()->getContents();
            $data = json_decode($response);

            $device = Devices::where('traccar_device_id',$data->id)->first();
            if($device){
                $data->owner = $device->Owner();
            }else{
                $data->owner = null;
            }


           $car = Vehicle::where('traccar_device_id',$data->id)->first();

            if($car){
                $plateNum = explode(" ",$car->plate_number);
                $data->plateNum = $plateNum;
            }


            return response()->json([
                'success' => true,
                'data'=>$data,
            ]);
        }catch(\Throwable $exception){
            return response()->json([
                'success' => false,
                'error'=>$exception->getMessage(),

            ],$exception->getCode());
        }
    }




    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(),
            [
                "plate_number" => 'required',
                "device_name" => 'required',
                "imei" => 'required',
//                "sim_card" => 'required',

            ],[
                'plate_number.required' => Lang::get('errors.plate_number',[],$request->lang),
                'device_name.required' => Lang::get('errors.device_name',[],$request->lang),
                'imei.required' => Lang::get('errors.imei',[],$request->lang),
//                'sim_card.required' => Lang::get('errors.sim_card',[],$request->lang),

            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()->first()]);
        }

        try {
            $props2 = [];

            foreach ($request['attributes'] as $prop){

                $props2[$prop['name']] = $prop['value'];
            }

            if(sizeof($props2) == 0){
                $props2 = new \stdClass();
            }

            $body2 = [

                'id'=> $id,
                'name'=> $request->device_name,
                'uniqueId'=> $request->imei,
                'status'=> 'offline',
                'disabled' => false,
                'lastUpdate' => now(),
                'phone' => $request->sim_card ?? null,
                'groupId'=> $request->device_branch ?? 0,
                'model'=> $request->device_model ?? null,
                'category'=> $request->device_category ?? null,
                'attributes'=> $props2

            ];
            $client = new Client();
            $res = $client->request('PUT', env('TRACCAR_API')."/devices/".$id,
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth,'Content-Type' => 'application/json'],
                    'body'    => json_encode($body2)

                ]);

            $response =  $res->getBody()->getContents();
            $deviceData = json_decode($response);

            $car = Vehicle::where('traccar_device_id',$deviceData->id)->first();

            if($car){
                $car->plate_number = $request->plate_number;
                $car->save();
            }

            $device = Devices::where('traccar_device_id',$deviceData->id)->first();

            if($device){
                $device->unique_id = $request->imei;
                $device->save();
            }

            return response()->json([
                'success' => true,
                'message'=> Lang::get('valid.updated',[],$request->lang),
                'data'=>$deviceData,
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getEventsById($id)
    {
        $client = new Client();
        $res = $client->request('GET', env('TRACCAR_API')."/devices?id=".$id,
            [
                'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
            ]);

        $response =  $res->getBody()->getContents();
        $device = json_decode($response);


        $client = new Client();
        $res = $client->request('GET', env('TRACCAR_API')."/events/".$id,
            [
                'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
            ]);

        $response =  $res->getBody()->getContents();
        $data = json_decode($response);

        return response()->json([
            'success' => true,
            'data'=>$data,
            'device'=>$device[0]->name,
        ]);
    }

    public function devicesByUser($id)
    {
        $client = new Client();
        $res = $client->request('GET', env('TRACCAR_API')."/devices?userId=".$id,
            [
                'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
            ]);

        $response =  $res->getBody()->getContents();
        $data = json_decode($response);

        foreach ($data as $item){

            $vehicle = Vehicle::where('traccar_device_id',$item->id)
                ->first();
            $item->vehicle = $vehicle;
            $item->plateNumber = $vehicle->plate_number ?? "";
        }

        return response()->json([
            'success' => true,
            'data'=>$data,
        ]);

    }

    public function enableDisableDevice($id,$action)
    {

        if($action == "E"){
            $status = false;
        }else{
            $status = true;
        }
        try {

            $client = new Client();
            $res = $client->request('GET', env('TRACCAR_API')."/devices/".$id,
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
                ]);

            $response =  $res->getBody()->getContents();
            $data = json_decode($response);
            $data->disabled = $status;

            $client = new Client();
            $res = $client->request('PUT', env('TRACCAR_API')."/devices/".$id,
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth,'Content-Type' => 'application/json'],
                    'body'    => json_encode($data)

                ]);

            $response =  $res->getBody()->getContents();
            $data = json_decode($response);

            return response()->json([
                'success' => true,
            ]);

        }catch (\Throwable $exception){
            return response()->json([
                'success' => false,
                'error'=>$exception->getMessage(),
            ]);
        }
    }
}
