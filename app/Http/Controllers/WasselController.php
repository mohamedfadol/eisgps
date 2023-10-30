<?php

namespace App\Http\Controllers;

use App\Models\Devices;
use App\Models\Driver;
use App\Models\Facility;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\WaslCompany;
use App\Models\WaslDriver;
use App\Models\WaslVehicle;
use App\Models\WaslVehicleLocations;
use DateTime;
use DateTimeZone;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class WasselController extends Controller
{
    public function operatingCompanies(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(),
            [
                'company.identityNumber' => 'required',
                'company.commercial_record_number' => 'required_unless:company.facilityType,I',
                'company.commercial_record_issue_hijri_date' => 'required_unless:company.facilityType,I',
                'company.bithday_hijri' => 'required_if:company.facilityType,I',
                'company.phone_number' => 'required',
                'company.email' => 'required',
                'company.manager_name' => 'required_if:company.facilityType,C',
                'company.manager_phone' => 'required_if:company.facilityType,C',
                'company.manager_mobile' => 'required_if:company.facilityType,C',
                'vehicle.plate_number' => 'required',
                'vehicle.sequence_number' => 'required',
                'vehicle.plate_type' => 'required',
                'driver.identity_number' => 'required',
                'driver.birthday' => 'required',
                'driver.driver_mobile' => 'required',

            ],[
                'company.identityNumber.required' => Lang::get('errors.idNumber',[],$request->lang),
                'company.phone_number.required' => Lang::get('errors.phone_number',[],$request->lang),
                'company.email.required' => Lang::get('errors.email',[],$request->lang),
                'company.manager_name.required_if' => Lang::get('errors.manager_name',[],$request->lang),
                'company.manager_phone.required_if' => Lang::get('errors.manager_phone',[],$request->lang),
                'company.manager_mobile.required_if' => Lang::get('errors.manager_mobile',[],$request->lang),
                'company.commercial_record_number.required' => Lang::get('errors.commercial_record_number',[],$request->lang),
                'company.commercial_record_issue_hijri_date.required' => Lang::get('errors.commercial_record_issue_hijri_date',[],$request->lang),
                'company.bithday_hijri.required_if' => Lang::get('errors.bithday_hijri',[],$request->lang),
                'vehicle.plate_number.required' => Lang::get('errors.plate_number',[],$request->lang),
                'vehicle.sequence_number.required' => Lang::get('errors.sequence_number',[],$request->lang),
                'vehicle.plate_type.required' => Lang::get('errors.plate_type',[],$request->lang),
                'driver.identity_number.required' => Lang::get('errors.identity_number',[],$request->lang),
                'driver.birthday.required' => Lang::get('errors.driver_birthday',[],$request->lang),
                'driver.driver_mobile.required' => Lang::get('errors.driver_mobile',[],$request->lang),

            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()->first()
            ]);
        }



        if($request->company['facilityType'] == "I"){
            $body = [
                "identityNumber"=> $request->company['identityNumber'],
                "dateOfBirthHijri"=> $request->company['bithday_hijri'],
                "phoneNumber"=> $request->company['phone_number'],
                "emailAddress"=> $request->company['email']
            ];
        }else{
            $body = [

                "identityNumber"=> $request->company['identityNumber'],
                "commercialRecordNumber"=> $request->company['commercial_record_number'],
                "commercialRecordIssueDateHijri"=> $request->company['commercial_record_issue_hijri_date'],
                "phoneNumber"=> $request->company['phone_number'],
                "emailAddress"=> $request->company['email'],
                "managerName"=> $request->company['manager_name'],
                "managerPhoneNumber"=> $request->company['manager_phone'],
                "managerMobileNumber"=> $request->company['manager_mobile']

            ];
        }

        try{

            //send company
            $client = new Client();
            //check if company exist
            $check = WaslCompany::where('traccar_id',$request->traccar_id)->first();

            if($check == null){

                $res = $client->request('POST', env('WASL_API')."/operating-companies",
                    [
                        'headers' => [
                            'Content-Type'=>'application/json',
                            'x-api-key' => env('WASL_TOKEN')
                        ],
                        'body'    => json_encode($body)
                    ]);

                $response =  $res->getBody()->getContents();
                $data = json_decode($response);

                $companyWaslId = $data->result->referenceKey;

                $waslCompany = new WaslCompany();
                $waslCompany->traccar_id = $request->traccar_id;
                $waslCompany->wasl_company_id = $companyWaslId;
                $waslCompany->save();

                Log::channel('wasl')->info("----------BODY---COMPANY-----------");
                Log::channel('wasl')->info(json_encode($body));
                Log::channel('wasl')->info("----------RESPONSE--COMPANY----------");
                Log::channel('wasl')->info(json_encode($data));
                Log::channel('wasl')->info("--------END---COMPANY--------------");
            }else{
                $companyWaslId = $check->wasl_company_id;
            }


            //send vehicle

            $plate = explode(" ",$request->vehicle['plate_number']);
            $vehBody = [
                "vehiclePlate"=> [
                    "number"=> $plate[0],
                    "rightLetter"=> $plate[1],
                    "middleLetter"=>  $plate[2],
                    "leftLetter"=> $plate[3]
                ],
                "sequenceNumber"=> $request->vehicle['sequence_number'],
                "plateType"=>  $request->vehicle['plate_type'],
                "imeiNumber"=> $request->vehicle['imei'],
            ];

            //check if vehicle exist
            $check = WaslVehicle::where('traccar_id',$request->traccar_id)
                ->where('traccar_device_id',$request->device_id)
                ->first();

            if($check == null){
                $client = new Client();
                $res = $client->request('POST', env('WASL_API')."/operating-companies/".$companyWaslId."/vehicles",
                    [
                        'headers' => [
                            'x-api-key' => env('WASL_TOKEN'),
                            'Content-Type'=>'application/json'
                        ],
                        'body'    => json_encode($vehBody,JSON_UNESCAPED_UNICODE)
                    ]);

                $response =  $res->getBody()->getContents();
                $dataVehicle = json_decode($response);

                $waslVehicle = new WaslVehicle();
                $waslVehicle->traccar_id = $request->traccar_id;
                $waslVehicle->traccar_device_id = $request->device_id;
                $waslVehicle->wasl_vehicle_id = $dataVehicle->result->referenceKey;
                $waslVehicle->imei = $request->vehicle['imei'];
                $waslVehicle->save();

                Log::channel('wasl')->info("----------BODY---VEHICLE-----------");
                Log::channel('wasl')->info(json_encode($vehBody));
                Log::channel('wasl')->info("----------RESPONSE--VEHICLE----------");
                Log::channel('wasl')->info(json_encode($dataVehicle));
                Log::channel('wasl')->info("--------END---VEHICLE--------------");
            }

            //add Driver

            $driverBody = [
                "identityNumber"=> $request->driver['identity_number'],
                "dateOfBirthHijri"=>$request->driver['birthday'],
                "mobileNumber"=> $request->driver['driver_mobile']
            ];

            //check if driver exist
            $waslDriver = WaslDriver::where('traccar_id',$request->traccar_id)
                ->where('traccar_driver_id',$request->driver_id)
                ->first();

            if($waslDriver == null){
                $client = new Client();
                $res = $client->request('POST', env('WASL_API')."/operating-companies/".$companyWaslId."/drivers",
                    [
                        'headers' => [
                            'x-api-key' => env('WASL_TOKEN'),
                            'Content-Type'=>'application/json'
                        ],
                        'body'    => json_encode($driverBody,JSON_UNESCAPED_UNICODE)
                    ]);

                $response =  $res->getBody()->getContents();
                $dataDriver = json_decode($response);

                $waslDriver = new WaslDriver();
                $waslDriver->traccar_id = $request->traccar_id;
                $waslDriver->traccar_driver_id = $request->driver_id;
                $waslDriver->wasl_driver_id = $dataDriver->result->referenceKey;
                $waslDriver->save();

                Log::channel('wasl')->info("----------BODY---DRIVER-----------");
                Log::channel('wasl')->info(json_encode($driverBody));
                Log::channel('wasl')->info("----------RESPONSE--DRIVER----------");
                Log::channel('wasl')->info(json_encode($dataDriver));
                Log::channel('wasl')->info("--------END---DRIVER--------------");
            }


            //Send live location
            $deviceTime =new DateTime('NOW');
            $deviceTime = $deviceTime->format('Y-m-d\TH:i:s.v\Z');

            $liveLocation = [
                "vehicleLocations" => [
                    [
                        "referenceKey"=>$waslVehicle->wasl_vehicle_id,
                        "driverReferenceKey"=>$waslDriver->wasl_driver_id,
                        "latitude"=>$request->live_location['latitude'],
                        "longitude"=> $request->live_location['longitude'],
                        "velocity"=> $request->live_location['velocity'],
                        "weight"=> $request->live_location['weight'],
                        "locationTime" => $deviceTime,
                        "vehicleStatus"=> $request->live_location['vehicule_state'],
                        "address"=> $request->live_location['address'] ?? "السعودية",
                        "roleCode"=>$request->live_location['role_code'],
                    ]
                ]
            ];
            Log::channel('wasl')->info("----------BODY---LOCATION-----------");
            Log::channel('wasl')->info(json_encode($liveLocation));
            //check if locations exist
            $check = WaslVehicleLocations::where('traccar_id',$request->traccar_id)
                ->where('traccar_vehicle_id',$request->device_id)
                ->first();
            if($check == null){
                $client = new Client();
                $res = $client->request('POST', env('WASL_API')."/locations",
                    [
                        'headers' => [
                            'x-api-key' => env('WASL_TOKEN'),
                            'Content-Type'=>'application/json'
                        ],
                        'body'    => json_encode($liveLocation)
                    ]);

                $response =  $res->getBody()->getContents();
                $dataVehLocation = json_decode($response);

                $waslVehLocation = new WaslVehicleLocations();
                $waslVehLocation->traccar_id = $request->traccar_id;
                $waslVehLocation->traccar_vehicle_id = $request->device_id;
                $waslVehLocation->wasl_result = $response ?? null;
                $waslVehLocation->save();

                Log::channel('wasl')->info("----------RESPONSE--LOCATION----------");
                Log::channel('wasl')->info(json_encode($dataVehLocation));
                Log::channel('wasl')->info("--------END---LOCATION--------------");
            }



            return response()->json([
                'success'=>true,
                'message'=>Lang::get('valid.sent_to_wasl',[],$request->lang),
            ]);
        }catch (\Throwable $exception){

                return response()->json([
                    'success'=>false,
                    'message'=>$exception->getMessage(),
                    'code'=>$exception->getCode()

                ]);


//                $response = json_decode($exception->getResponse()->getBody()->getContents());
//
//                if(isset($response->errorMsg)){
//                    $messageError = $response->errorMsg;
//                }elseif(isset($response->resultCode)){
//                    $messageError = Lang::get('wasl.'.$response->resultCode,[],$request->lang);
//                }else{
//                    $messageError = "Error occured please try again or contact webmaster";
//                }
//                return response()->json([
//                    'success'=>false,
//                    'message'=>$messageError,
//                    'error'=>$exception->getMessage(),
//                    'code'=>$exception->getCode(),
//                    'line'=>$exception->getLine(),
//                    'file'=>$exception->getFile(),
//                ]);


        }


    }

    public function updateOperatingCompanies(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(),
            [
                'company.identityNumber' => 'required',
                'company.commercial_record_number' => 'required_unless:company.facilityType,I',
                'company.commercial_record_issue_hijri_date' => 'required_unless:company.facilityType,I',
                'company.bithday_hijri' => 'required_if:company.facilityType,I',
                'company.phone_number' => 'required',
                'company.email' => 'required',
                'company.manager_name' => 'required_if:company.facilityType,C',
                'company.manager_phone' => 'required_if:company.facilityType,C',
                'company.manager_mobile' => 'required_if:company.facilityType,C',
                'vehicle.plate_number' => 'required',
                'vehicle.sequence_number' => 'required',
                'vehicle.plate_type' => 'required',
                'driver.identity_number' => 'required',
                'driver.birthday' => 'required',
                'driver.driver_mobile' => 'required',

            ],[
                'company.identityNumber.required' => Lang::get('errors.idNumber',[],$request->lang),
                'company.phone_number.required' => Lang::get('errors.phone_number',[],$request->lang),
                'company.email.required' => Lang::get('errors.email',[],$request->lang),
                'company.manager_name.required_if' => Lang::get('errors.manager_name',[],$request->lang),
                'company.manager_phone.required_if' => Lang::get('errors.manager_phone',[],$request->lang),
                'company.manager_mobile.required_if' => Lang::get('errors.manager_mobile',[],$request->lang),
                'company.commercial_record_number.required' => Lang::get('errors.commercial_record_number',[],$request->lang),
                'company.commercial_record_issue_hijri_date.required' => Lang::get('errors.commercial_record_issue_hijri_date',[],$request->lang),
                'company.bithday_hijri.required_if' => Lang::get('errors.bithday_hijri',[],$request->lang),
                'vehicle.plate_number.required' => Lang::get('errors.plate_number',[],$request->lang),
                'vehicle.sequence_number.required' => Lang::get('errors.sequence_number',[],$request->lang),
                'vehicle.plate_type.required' => Lang::get('errors.plate_type',[],$request->lang),
                'driver.identity_number.required' => Lang::get('errors.identity_number',[],$request->lang),
                'driver.birthday.required' => Lang::get('errors.driver_birthday',[],$request->lang),
                'driver.driver_mobile.required' => Lang::get('errors.driver_mobile',[],$request->lang),

            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()->first()
            ]);
        }

        try{

            //update company
            if($request->company['facilityType'] != "I") {
                $body = [

                    "identityNumber"=> $request->company['identityNumber'],
                    "commercialRecordNumber"=> $request->company['commercial_record_number'],
                    "commercialRecordIssueDateHijri"=> $request->company['commercial_record_issue_hijri_date'],
                    "phoneNumber"=> $request->company['phone_number'],
                    "emailAddress"=> $request->company['email'],
                    "managerName"=> $request->company['manager_name'],
                    "managerPhoneNumber"=> $request->company['manager_phone'],
                    "managerMobileNumber"=> $request->company['manager_mobile']

                ];
                $client = new Client();

                $res = $client->request('PATCH', env('WASL_API') . "/operating-companies/contact-info",
                    [
                        'headers' => [
                            'Content-Type' => 'application/json',
                            'x-api-key' => env('WASL_TOKEN')
                        ],
                        'body' => json_encode($body,JSON_UNESCAPED_UNICODE)
                    ]);

                $response = $res->getBody()->getContents();
                $data = json_decode($response);

                $cmp = WaslCompany::where('traccar_id',$request->traccar_id)->first();
                $companyWaslId = $cmp->wasl_company_id;

                Log::channel('wasl')->info("----------BODY---COMPANY-----------");
                Log::channel('wasl')->info(json_encode($body));
                Log::channel('wasl')->info("----------RESPONSE--COMPANY----------");
                Log::channel('wasl')->info(json_encode($data));
                Log::channel('wasl')->info("--------END---COMPANY--------------");

            }else{
                $cmp = WaslCompany::where('traccar_id',$request->traccar_id)->first();
                $companyWaslId = $cmp->wasl_company_id;
            }

            //update vehicle

            $check = WaslVehicle::where('imei',$request->vehicle['imei'])->first();
            if($check == null){
                $vehBody = [

                    "sequenceNumber"=> $request->vehicle['sequence_number'],
                    "imeiNumber"=> $request->vehicle['imei'],
                ];


                $client = new Client();
                $res = $client->request('PUT', env('WASL_API')."/vehicles/imei",
                    [
                        'headers' => [
                            'x-api-key' => env('WASL_TOKEN'),
                            'Content-Type'=>'application/json'
                        ],
                        'body'    => json_encode($vehBody,JSON_UNESCAPED_UNICODE)
                    ]);

                $response =  $res->getBody()->getContents();
                $dataVehicle = json_decode($response);


                Log::channel('wasl')->info("----------BODY---VEHICLE-----------");
                Log::channel('wasl')->info(json_encode($vehBody));
                Log::channel('wasl')->info("----------RESPONSE--VEHICLE----------");
                Log::channel('wasl')->info(json_encode($dataVehicle));
                Log::channel('wasl')->info("--------END---VEHICLE--------------");

            }



            //update Driver

            $driverBody = [
                "identityNumber"=> $request->driver['identity_number'],
                "mobileNumber"=> $request->driver['driver_mobile']
            ];


            $client = new Client();
            $res = $client->request('PUT', env('WASL_API')."/operating-companies/".$companyWaslId."/drivers",
                [
                    'headers' => [
                        'x-api-key' => env('WASL_TOKEN'),
                        'Content-Type'=>'application/json'
                    ],
                    'body'    => json_encode($driverBody,JSON_UNESCAPED_UNICODE)
                ]);

            $response =  $res->getBody()->getContents();
            $dataDriver = json_decode($response);


            Log::channel('wasl')->info("----------BODY---DRIVER-----------");
            Log::channel('wasl')->info(json_encode($driverBody));
            Log::channel('wasl')->info("----------RESPONSE--DRIVER----------");
            Log::channel('wasl')->info(json_encode($dataDriver));
            Log::channel('wasl')->info("--------END---DRIVER--------------");



            $veh_saved = WaslVehicle::where('traccar_id',$request->traccar_id)->first();
            $driver_saved = WaslDriver::where('traccar_id',$request->traccar_id)->first();
            //Update location

            $deviceTime =new DateTime('NOW');
            $deviceTime = $deviceTime->format('Y-m-d\TH:i:s.v\Z');

            $liveLocation = [
                "vehicleLocations" => [
                    [
                        "referenceKey"=>$veh_saved->wasl_vehicle_id,
                        "driverReferenceKey"=>$driver_saved->wasl_driver_id,
                        "latitude"=>$request->live_location['latitude'],
                        "longitude"=> $request->live_location['longitude'],
                        "velocity"=> $request->live_location['velocity'],
                        "weight"=> $request->live_location['weight'],
                        "locationTime" => $deviceTime,
                        "vehicleStatus"=> $request->live_location['vehicule_state'],
                        "address"=> $request->live_location['address'] ?? "السعودية",
                        "roleCode"=>$request->live_location['role_code'],
                    ]
                ]
            ];
            Log::channel('wasl')->info("----------BODY---LOCATION-----------");
            Log::channel('wasl')->info(json_encode($liveLocation));

            $client = new Client();
            $res = $client->request('POST', env('WASL_API')."/locations",
                [
                    'headers' => [
                        'x-api-key' => env('WASL_TOKEN'),
                        'Content-Type'=>'application/json'
                    ],
                    'body'    => json_encode($liveLocation)
                ]);

            $response =  $res->getBody()->getContents();
            $dataVehLocation = json_decode($response);

            $waslVehLocation = new WaslVehicleLocations();
            $waslVehLocation->traccar_id = $request->traccar_id;
            $waslVehLocation->traccar_vehicle_id = $request->device_id;
            $waslVehLocation->wasl_result = $response ?? null;
            $waslVehLocation->save();


            Log::channel('wasl')->info("----------RESPONSE--LOCATION----------");
            Log::channel('wasl')->info(json_encode($dataVehLocation));
            Log::channel('wasl')->info("--------END---LOCATION--------------");


            return response()->json([
                'success'=>true,
                'message'=>Lang::get('valid.updated_in_wasl',[],$request->lang),
            ]);
        }catch (\Throwable $exception){
            if(isset($response->errorMsg)){
                $messageError = $response->errorMsg;
            }elseif(isset($response->resultCode)){
                $messageError = Lang::get('wasl.'.$response->resultCode,[],$request->lang);
            }else{
                $messageError = "Error occured please try again or contact webmaster";
            }
            return response()->json([
                'success'=>false,
                'message'=>$messageError,
                'error'=>$exception->getMessage(),
                'code'=>$exception->getCode(),
                'line'=>$exception->getLine(),
                'file'=>$exception->getFile(),
            ]);
        }


    }

    public function checkActionWithWasl(Request $request){
        $company = WaslCompany::where('traccar_id',$request->company)->first();

        $vehicle = WaslVehicle::where('traccar_id',$request->company)
            ->where('traccar_device_id',$request->vehicle)
            ->first();
        $driver = WaslDriver::where('traccar_id',$request->company)
            ->where('traccar_driver_id',$request->driver)
            ->first();

        if($company == null || $vehicle == null || $driver == null){
            return response()->json([
                'success'=>true,
                'action'=>true

            ]);
        }

        return response()->json([
            'success'=>true,
            'action'=>false,

        ]);


    }


    public function WaslList(){
        $list = WaslCompany::all();
        foreach ($list as $item){
            $user = User::where('traccar_id',$item->traccar_id)->first();
            if($user->accountType == "2"){
                $url = "/operating-companies?identityNumber=".$user->id_number;
            }else{
                $facility = Facility::where('traccar_id',$item->traccar_id)->first();
                $url = "/operating-companies?identityNumber=".$facility->id_number."&commercialRecordNumber=".$facility->commercial_register_number;
            }

            $client = new Client();
            $res = $client->request('GET', env('WASL_API').$url,
                [
                    'headers' => [
                        'x-api-key' => env('WASL_TOKEN'),
                        'Content-Type'=>'application/json'
                    ],

                ]);
            $response =  $res->getBody()->getContents();
            $dataCompany = json_decode($response);
            $item->wasl = $dataCompany;


        }
        return response()->json([
            'success'=>true,
            'data'=>$list,

        ]);
    }

    public function WaslVehiclesList($id)
    {
        $list = WaslVehicle::where('traccar_id',$id)->get();

        foreach ($list as $item){

            $car = Vehicle::where('traccar_device_id',$item->traccar_device_id)->first();

            $client = new Client();
            $res = $client->request('GET', env('WASL_API')."/vehicles?sequenceNumber=".$car->serial_number,
                [
                    'headers' => [
                        'x-api-key' => env('WASL_TOKEN'),
                        'Content-Type'=>'application/json'
                    ],

                ]);
            $response =  $res->getBody()->getContents();
            $dataVehicle = json_decode($response);
            $item->wasl = $dataVehicle;


        }
        return response()->json([
            'success'=>true,
            'data'=>$list,

        ]);
    }


    public function WaslDriversList($id)
    {
        $list = WaslDriver::where('traccar_id',$id)->get();

        foreach ($list as $item){

            $car = Driver::where('traccar_driver_id',$item->traccar_driver_id)->first();

            $client = new Client();
            $res = $client->request('GET', env('WASL_API')."/drivers?identityNumber=".$car->id_number,
                [
                    'headers' => [
                        'x-api-key' => env('WASL_TOKEN'),
                        'Content-Type'=>'application/json'
                    ],

                ]);
            $response =  $res->getBody()->getContents();
            $dataDriver = json_decode($response);
            $item->wasl = $dataDriver;


        }
        return response()->json([
            'success'=>true,
            'data'=>$list,

        ]);
    }

    public function deleteOperatingCompanies($id){

        $company = WaslCompany::where('traccar_id',$id)->first();

        $client = new Client();
        $res = $client->request('DELETE', env('WASL_API')."/operating-companies/".$company->wasl_company_id,
            [
                'headers' => [
                    'x-api-key' => env('WASL_TOKEN'),
                    'Content-Type'=>'application/json'
                ],

            ]);
        $response =  $res->getBody()->getContents();
        $response = json_decode($response);

        WaslVehicleLocations::where('traccar_id',$id)->delete();
        WaslDriver::where('traccar_id',$id)->delete();
        WaslVehicle::where('traccar_id',$id)->delete();
        WaslCompany::where('traccar_id',$id)->delete();

        return response()->json([
            'success'=>true,

        ]);


    }

    public function deleteWaslVehicle($id){
        $car = WaslVehicle::where('traccar_device_id',$id)->first();
        $company = WaslCompany::where('traccar_id',$car->traccar_id)->first();

        $client = new Client();
        $res = $client->request('DELETE', env('WASL_API')."/operationCompany/".$company->wasl_company_id."/vehicle/".$car->wasl_vehicle_id,
            [
                'headers' => [
                    'x-api-key' => env('WASL_TOKEN'),
                    'Content-Type'=>'application/json'
                ],

            ]);
        $response =  $res->getBody()->getContents();
        $response = json_decode($response);

        $car->delete();

        return response()->json([
            'success'=>true,

        ]);
    }

    public function deleteWaslDriver($id){
        $driver = WaslDriver::where('traccar_driver_id',$id)->first();
        $company = WaslCompany::where('traccar_id',$driver->traccar_id)->first();

        $client = new Client();
        $res = $client->request('DELETE', env('WASL_API')."/operationCompany/".$company->wasl_company_id."/driver/".$driver->wasl_driver_id,
            [
                'headers' => [
                    'x-api-key' => env('WASL_TOKEN'),
                    'Content-Type'=>'application/json'
                ],

            ]);
        $response =  $res->getBody()->getContents();
        $response = json_decode($response);

        $driver->delete();

        return response()->json([
            'success'=>true,

        ]);
    }

    public function getGeocode($lat,$long)
    {

        try {
            if($lat != 0 && $long != 0){
                $client = new Client();
                //$res = $client->request('GET', env("GOOGLE_GEOCODE")."?latlng=".$lat.",".$long."&key=".env('GOOGLE_API_KEY')."&language=ar");
                $res = $client->request('GET', env("GEOCODE_URL")."".$lat.",".$long."&lang=ar-AR&apiKey=".env('GEOCODE_APIKEY'));
                $response =  $res->getBody()->getContents();
                $response = json_decode($response);

                return response()->json([
                    'success'=>true,
                    //'address'=>$response->results[0]->formatted_address
                    'address'=>$response->items[0]->title
                ]);
            }else{
                return response()->json([
                    'success'=>true,
                    'address'=>""
                ]);
            }



        }catch (\Throwable $exception){
            return response()->json([
                'success' => false,
                'error'=>$exception->getMessage(),
                'address'=>null

            ],$exception->getCode());
        }

    }


    //cron every 2 min
    public function liveTrackingMoving()
    {
        $allVehicles = WaslVehicle::all();

        foreach ($allVehicles as $vehicle){

            $driver = WaslDriver::where('traccar_id',$vehicle->traccar_id)->first();
            $waslDriverId = $driver->wasl_driver_id;

            $deviceId = $vehicle->traccar_device_id;
            $waslVehicleId = $vehicle->wasl_vehicle_id;
            $client = new Client();
            $res = $client->request('GET', env('TRACCAR_API')."/devices/".$deviceId,
                [
                    'headers' => ['Authorization' => 'Basic '.env('ADMIN_BASIC_AUTH')]
                ]);

            $response =  $res->getBody()->getContents();
            $device = json_decode($response);
            $position = $device->positionId;

            $client = new Client();
            $res = $client->request('GET', env('TRACCAR_API')."/positions?id=".$position,
                [
                    'headers' => ['Authorization' => 'Basic '.env('ADMIN_BASIC_AUTH')]
                ]);

            $response =  $res->getBody()->getContents();
            $myPosition = json_decode($response);
            $ignition = $myPosition->attributes->ignition;
            $motion = $myPosition->attributes->motion;

            if($ignition == true && $motion == true){

                $state_veh = "MOVING";


                $liveLocation = [
                    "vehicleLocations" => [
                        [
                            "referenceKey"=>$waslVehicleId,
                            "driverReferenceKey"=>$waslDriverId,
                            "latitude"=>$myPosition->latitude,
                            "longitude"=> $myPosition->longitude,
                            "velocity"=> $myPosition->speed,
                            "weight"=> $myPosition->attributes->adc1,
//                        "locationTime" => $request->live_location['deviceTime'],
                            "locationTime" => "2021-06-29T10:01:22.121Z",
                            "vehicleStatus"=> $state_veh,
                            "address"=> $request->live_location['address'] ?? "السعودية",
                            "roleCode"=>"T1",
                        ]
                    ]
                ];
            }

        }


        return response()->json([
            'success'=>true,
            'data'=>$allVehicles
        ]);
    }



}
