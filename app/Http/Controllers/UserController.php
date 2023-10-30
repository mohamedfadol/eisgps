<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Get Users
     * @response {
    "success": true,
    "data": [
    {
    "id": 1,
    "attributes": {
    },
    "name": "fahd",
    "login": "",
    "email": "fahd@example.com",
    "phone": "+966505263775",
    "readonly": false,
    "administrator": false,
    "map": "custom",
    "latitude": 48.8567,
    "longitude": 2.3508,
    "zoom": 17,
    "twelveHourFormat": true,
    "coordinateFormat": "dms",
    "disabled": false,
    "expirationTime": null,
    "deviceLimit": -1,
    "userLimit": 0,
    "deviceReadonly": false,
    "token": "TUo4bYxpEjHILARgTwALsCsVGPzWr1Pc",
    "limitCommands": false,
    "poiLayer": "",
    "password": null
    },
    {
    "id": 3,
    "attributes": {},
    "name": "ahmad",
    "login": "",
    "email": "ahmad@example.com",
    "phone": "",
    "readonly": false,
    "administrator": false,
    "map": "custom",
    "latitude": 0,
    "longitude": 0,
    "zoom": 0,
    "twelveHourFormat": true,
    "coordinateFormat": "dms",
    "disabled": false,
    "expirationTime": null,
    "deviceLimit": 3,
    "userLimit": 0,
    "deviceReadonly": false,
    "token": "kJHzWZGXhfWVR0xbklb9nZZ8lFU5hHQ7",
    "limitCommands": false,
    "poiLayer": "",
    "password": null
    }


    ]
    }
     */
    public function index()
    {
        try{
            $client = new Client();
            $res = $client->request('GET', env('TRACCAR_API')."/users",
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
                ]);

            $response =  $res->getBody()->getContents();
            $data = json_decode($response);

            foreach ($data as $user){
                $usr = User::where('traccar_id',$user->id)->first();
                if($usr != null){
                    $user->start_date = $usr->start_date;
                }

            }

            return response()->json([
                'success' => true,
                'data'=>$data,
            ]);
        }catch(\Throwable $exception){
            return response()->json([
                'success' => false,
                'message'=>[
                    'ar'=>Lang::get('errors.not_auth',[],'ar'),
                    'en'=>Lang::get('errors.not_auth',[],'en')
                ],
            ],$exception->getCode());
        }
    }



    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $client = new Client();
        $res = $client->request('GET', env('TRACCAR_API')."/users/".$id,
            [
                'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
            ]);

        $response =  $res->getBody()->getContents();
        $data = json_decode($response);

        $user = User::where('traccar_id',$id)->first();
        $data->user = $user;


        return response()->json([
            'success' => true,
            'data'=>$data,
        ]);
    }




    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(),
            [
                "fullname" => 'required',
                "account_type" => 'required',
                "email" => 'required|email',
                "phone" => 'required|unique:users,mobile,'.$id.',traccar_id',
                "birthday" => 'required',
                "ident_number" => 'required',

            ],[
                'fullname.required' => Lang::get('errors.fullname',[],$request->lang),
                'email.required' => Lang::get('errors.email',[],$request->lang),
                'email.email' => Lang::get('errors.email_format',[],$request->lang),
                'phone.required' => Lang::get('errors.phone_number',[],$request->lang),
                'birthday.required' => Lang::get('errors.bithday_hijri',[],$request->lang),
                'account_type.required' => Lang::get('errors.account_type',[],$request->lang),
                'ident_number.required' => Lang::get('errors.ident_number',[],$request->lang),

            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()->first()]);
        }

        $props = [];

        foreach ($request['attributes'] as $prop){

            $props[$prop['name']] = $prop['value'];
        }

        if(sizeof($props) == 0){
            $props = new \stdClass();
        }





        $body = [
            'id'=>$id,
            'name'=>$request->fullname,
            'email'=>$request->email,
            'phone'=>$request->phone ?? null,
            'readonly'=>$request->readOnly,
            'deviceReadonly'=>$request->deviceReadOnly,
            'administrator'=>$request->isAdmin,
            'map'=>'custom',
            'disabled'=>$request->isDisabled,
            'latitude'=>$request->lat,
            'longitude'=>$request->long,
            'zoom'=>$request->approximation,
            'twelveHourFormat'=>$request->twelveHour,
            'coordinateFormat'=>$request->coordinate_format ?? null,
            'poiLayer'=>$request->pol,
            'limitCommands'=>$request->limitCommands ,
            'deviceLimit'=>$request->max_devices ?? -1,
            'userLimit'=>$request->max_users ?? 0,
            'expirationTime'=>$request->expiry_date ?? null,
            'token'=>md5(uniqid(rand(), true)),
            'attributes'=> $props

        ];

        try {
            $client = new Client();
            $res = $client->request('PUT', env('TRACCAR_API')."/users/".$id,
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth,'Content-Type' => 'application/json'],
                    'body'    => json_encode($body)

                ]);

            $response =  $res->getBody()->getContents();
            $userData = json_decode($response);

            $user = User::where('traccar_id',$id)->first();
            $user->traccar_id = $userData->id;
            $user->name = $request->fullname;
            $user->email = $request->email;
            $user->mobile = $request->phone ?? null;
            $user->birthday = $request->birthday ?? null;
            $user->address = $request->address ?? null;
            $user->addressNo = $request->addressNo ?? null;
            $user->city = $request->city ?? null;
            $user->state = $request->state ?? null;
            $user->zipCode = $request->zipCode ?? null;
            $user->mapLayer = $request->maplayer ?? null;
            $user->id_number = $request->ident_number ?? null;
            $user->wassel =  $request->wassel ?? false;
            $user->accountType = (int)$request->account_type;
            $user->gender = $request->user_gender ?? null;
            $user->start_date = $request->start_date ?? null;
            $user->expiry_date = $request->expiry_date ?? null;
            $user->save();

            $findCompany = Facility::where('traccar_id',$id)
                ->where('owner_id',$user->id)
                ->first();

            if($request->account_type != 2){

                if($findCompany == null){
                    $company = new Facility();
                    $company->traccar_id = $id;
                    $company->owner_id = $user->id;
                    $company->full_name_ar = $user->name;
                    $company->number_at_ministry = $request->ident_number;
                    $company->manager_name = $user->name;
                    $company->manager_mail = $request->email;
                    $company->manager_mobile = $request->phone;
                    $company->save();
                }

            }

            return response()->json([
                'success' => true,
                'message'=>Lang::get('valid.updated',[],$request->lang),

            ]);

        }catch (\Throwable $exception){
            return response()->json([
                'success' => false,
                'message'=>Lang::get('errors.failed',[],$request->lang),
                'error'=>$exception->getMessage(),
            ]);
        }
    }


    public function destroy($id)
    {
        try {
            $client = new Client();
            $res = $client->request('DELETE', env('TRACCAR_API')."/users/".$id,
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
                ]);

            $response =  $res->getBody()->getContents();
            $data = json_decode($response);

            $user = User::where('traccar_id',$id)->first();
            if($user)
            {
                $user->delete();
            }

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

    /**
     * User login
     * @bodyParam  phone tel required  Example: +966234231456

     * @response {


     * @param Request $request
     */

    public function login(Request  $request)
    {


        $validator = Validator::make($request->all(),
            [
                'email' => 'required',
                'password' => 'required',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'errors'=>$validator->errors()
            ]);
        }

        $body = [
            'email' => $request->email,
            'password' => $request->password
        ];


        $client = new Client();
        try {

            $res = $client->request('POST', env('TRACCAR_API')."/session",
                [
                    'headers' => [
                        'Content-Type' => 'application/x-www-form-urlencoded'
                    ],
                    'form_params'    => $body
                ]);

            $response =  $res->getBody()->getContents();
            $response = json_decode($response);

            $findUser = User::where('traccar_id',$response->id)
                ->first();
            if(!$findUser){

                $findUserByMail = User::where('email',$request->email)
                    ->first();

                if(!$findUserByMail) {
                    $user = new User();
                    $user->traccar_id = $response->id;
                    $user->name = $response->name;
                    $user->mobile = $response->phone;
                    $user->email = $response->email;
                    if($response->administrator == true){
                        $user->accountType = 1;
                    }else{
                        $user->accountType = 2;
                    }
                    $basic = base64_encode($request->email.":".$request->password);
                    $user->basicAuth = $basic;
                    $user->save();

                    auth()->login($user);

                }else{
                    $findUserByMail->traccar_id = $response->id;
                    $findUserByMail->save();
                    auth()->login($findUserByMail);
                }

            }else{
                $basic = base64_encode($request->email.":".$request->password);
                $findUser->basicAuth = $basic;
                $findUser->save();
                auth()->login($findUser);
            }


            $loginToken = auth()->user()->createToken('EISGPS')->accessToken;



            return response()->json([
                'success' => true,
                'token'=> $response->token,
                'loginToken'=> $loginToken,
                'user'=> $response
            ]);

        }catch (\Throwable $exception){
            return response()->json([
                'success' => false,
                'error'=>$exception->getMessage()
            ]);
        }
    }

    /**
     * Login Request Code
     * @bodyParam  mobile string required account mobile Example: +966123456789
     * @bodyParam  sms_lang string required ar or en Example: ar
     * @response {
    "success": true,
    "message": {
    "ar": "تم إرسال الرسالة القصيرة",
    "en": "Sms sent"
    }
    }
     * @response  404 {
    "success": false,
    "message": {
    "ar": "الحساب غير موجود",
    "en": "Account not found"
    }
    }
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginMobile(Request  $request)
    {
        $validator = Validator::make($request->all(),
            [
                'mobile' => 'required',
                'sms_lang' => 'required|in:ar,en',
            ]);
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()->first()
            ]);
        }

        try {

            $findUser = User::where('mobile',$request->mobile)->first();

            if($findUser){

                $findUser->authMobileCode = $findUser->MobileCode();


                $number = explode("+",$request->mobile);
                if(isset($number[1])){
                    $number = $number[1];
                }else{
                    $number = $number[0];
                }
                $findUser->save();

                if($request->sms_lang =="en"){
                    $message = "EISGPS Your account access code ".$findUser->authMobileCode;
                }else{
                    $message = $findUser->authMobileCode. " رمز الدخول لحسابك EISGPS";
                }


                $client = new Client();
                //SEnd SMS
                //$client->request('GET', env('OUR_SMS_API')."?username=".env('OUR_SMS_USERNAME')."&password=".env('OUR_SMS_PASSWORD')."&message=".$message."&numbers=".$number."&sender=".env('OUR_SMS_SENDER')."&unicode=E&return=json");

                return response()->json([
                    'success' => true,
                    'message'=> [
                        'ar'=>Lang::get('valid.sms_sent',[],'ar'),
                        'en'=>Lang::get('valid.sms_sent',[],'en'),
                    ],
                    'code'=>$message
                ]);

            }

            return response()->json([
                'success' => false,
                'message'=> [
                    'ar'=>Lang::get('errors.account_not_fount',[],'ar'),
                    'en'=>Lang::get('errors.account_not_fount',[],'en'),
                ]

            ]);




        }catch (\Throwable $exception){
            return response()->json([
                'success' => false,
                'message'=>$exception->getMessage()
            ]);
        }
    }

    /**
     * Login Confirm Code
     * @bodyParam  mobile string required account mobile Example: +966123456789
     * @bodyParam  code integer required Code received by SMS  Example: 712349
     * @response {
    "success": true,
    "data": {
    "id": 1,
    "attributes": {
    "mail.smtp.auth": true,
    "mail.smtp.from": "email@example.com",
    "mail.smtp.host": "smtp.domain.com",
    "mail.smtp.password": "mypassword",
    "mail.smtp.port": 465,
    "mail.smtp.ssl.enable": true,
    "mail.smtp.username": "email@example.com",
    "web.liveRouteLength": 16,
    "web.selectZoom": 18,
    "web.maxZoom": 18,
    "timezone": "Asia/Riyadh",
    "volumeUnit": "ltr",
    "speedUnit": "kmh",
    "distanceUnit": "km",
    "notificationTokens": "daYwvZBTv04RktRacLxnag:APA91b........."
    },
    "name": "admin",
    "login": "",
    "email": "gps@eis.net.sa",
    "phone": "112333343",
    "readonly": false,
    "administrator": true,
    "map": "custom",
    "latitude": 48.8567,
    "longitude": 2.3508,
    "zoom": 17,
    "twelveHourFormat": true,
    "coordinateFormat": "dms",
    "disabled": false,
    "expirationTime":  "2024-04-01T15:04:31.000000Z",
    "deviceLimit": 1,
    "userLimit": 1,
    "deviceReadonly": false,
    "token": "TUo4bYxpEjHILARgTwALsCsVGPzWr1Pc",
    "limitCommands": false,
    "poiLayer": "",
    "password": null,
    "user": {
    "id": 21,
    "traccar_id": 44,
    "name": "my name",
    "email": "email@example.com",
    "gender": "M",
    "basicAuth": "DaBzQGVpcy5uZXQuc2E6RWlzQDE5OTA=",
    "mobile": "112333343",
    "birthday": null,
    "address": null,
    "addressNo": null,
    "city": "Jeddah",
    "state": null,
    "zipCode": null,
    "mapLayer": null,
    "id_number": 1003992990,
    "wassel": 1,
    "authMobileCode": null,
    "accountType": "2",
    "created_at": "2021-04-01T15:04:31.000000Z",
    "updated_at": "2021-04-01T16:32:28.000000Z"
    }
    },
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJ........"
    }
     * @response 404 {
    "success": false,
    "message": {
    "ar": "رمز الوصول غير صالح",
    "en": "Invalid access code"
    }
    }
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function loginMobileConfirm(Request  $request)
    {
        try {
            $validator = Validator::make($request->all(),
                [
                    'mobile' => 'required',
                    'code' => 'required|digits:6',
                ]);
            if ($validator->fails()) {
                return response()->json([
                    'success'=>false,
                    'errors'=>$validator->errors()->first()
                ]);
            }

            $user = User::where('mobile',$request->mobile)
                ->where('authMobileCode',$request->code)
                ->first();

            if($user){




                auth()->login($user);
                $loginToken = auth()->user()->createToken('EISGPS-Mobile')->accessToken;

                $user->authMobileCode = null;
                $user->save();

                $client = new Client();
                $res = $client->request('GET', env('TRACCAR_API')."/users/".$user->traccar_id,
                    [
                        'headers' => ['Authorization' => 'Basic '.auth()->user()->basicAuth]
                    ]);

                $response =  $res->getBody()->getContents();
                $data = json_decode($response);

                $data->user = $user;


                return response()->json([
                    'success'=>true,
                    'user'=> $data,
                    'loginToken'=>$loginToken,

                ]);
            }

            return response()->json([
                'success'=>false,
                'message'=> [
                    'ar'=>Lang::get('errors.access_code_invalid',[],'ar'),
                    'en'=>Lang::get('errors.access_code_invalid',[],'en'),
                ]
            ]);
        }catch (\Throwable $exception){
            return response()->json([
                'success' => false,
                'message'=>$exception->getMessage(),

            ]);
        }
    }

    public function getUserHaveWassel($type)
    {
        if($type == "C"){
            $users = User::where('accountType', '!=' , 2)
                ->where('wassel',true)
                ->get();
            foreach ($users as $user){
                $user->id_number = $user->Facility()->id_number ?? "";
                $user->facility = $user->Facility();
            }
        }else{
            $users = User::where('accountType', 2)
                ->where('wassel',true)
                ->get();
            foreach ($users as $user){
                $user->facility = new \stdClass();
            }

        }


        return response()->json([
            'success' => true,
            'data'=> $users,

        ]);

    }

    public function getPartnersList()
    {
        $client = new Client();
        $res = $client->request('GET', env('TRACCAR_API')."/users",
            [
                'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
            ]);

        $response =  $res->getBody()->getContents();
        $data = json_decode($response);

        $partners = [];
        foreach ($data as $usr){
            $localUser = User::where('traccar_id',$usr->id)->first();
            if(isset($localUser) && $localUser->accountType == 3){
                $partners[]= [
                    'traccar'=>$usr,
                    'eis'=>$localUser
                ];
            }
        }

        return response()->json([
            'success' => true,
            'data'=>$partners,
        ]);
    }


    public function getCustomersList()
    {
        $client = new Client();
        $res = $client->request('GET', env('TRACCAR_API')."/users",
            [
                'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
            ]);

        $response =  $res->getBody()->getContents();
        $data = json_decode($response);

        $customers = [];
        foreach ($data as $usr){
            $localUser = User::where('traccar_id',$usr->id)->first();
            if(isset($localUser) && $localUser->accountType == 2){
                $customers[]= [
                    'traccar'=>$usr,
                    'eis'=>$localUser
                ];
            }
        }

        return response()->json([
            'success' => true,
            'data'=>$customers,
        ]);
    }

    public function myProfile($token)
    {
        $client = new Client();
        $res = $client->request('GET', env('TRACCAR_API')."/session?token=".$token,
            [
                'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
            ]);

        $response =  $res->getBody()->getContents();
        $data = json_decode($response);

        $user = User::where('traccar_id',$data->id)->first();
        $data->user = $user;


        $company = Facility::where('traccar_id',$data->id)->first();

        $data->company = $company ?? new \stdClass();


        return response()->json([
            'success' => true,
            'data'=>$data,
        ]);
    }

    public function test()
    {
        dd(env('TRACCAR_API'));

    }
    public function test2()
    {
        try {
            $client = new Client();
            $res = $client->request('GET', env('WASL_API')."/operating-companies?identityNumber=1005683311");

            $response =  $res->getBody()->getContents();
            $data = json_decode($response);

            return response()->json([
                'success' => true,
                'data'=>$data

            ]);
        }catch (\Throwable $exception){
            return response()->json([
                'success' => false,
                'error'=>$exception->getMessage()

            ]);
        }


    }

    public function enableDisableUser($id,$action)
    {

        if($action == "E"){
            $status = false;
        }else{
            $status = true;
        }
        try {

            $client = new Client();
            $res = $client->request('GET', env('TRACCAR_API')."/users/".$id,
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
                ]);

            $response =  $res->getBody()->getContents();
            $data = json_decode($response);
            $data->disabled = $status;

            $client = new Client();
            $res = $client->request('PUT', env('TRACCAR_API')."/users/".$id,
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

    public function resetPassword(Request $request,$id)
    {

        try {

            $client = new Client();
            $res = $client->request('GET', env('TRACCAR_API')."/users/".$id,
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
                ]);

            $response =  $res->getBody()->getContents();
            $data = json_decode($response);
            $data->password = $request->password;

            $client = new Client();
            $res = $client->request('PUT', env('TRACCAR_API')."/users/".$id,
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth,'Content-Type' => 'application/json'],
                    'body'    => json_encode($data)

                ]);

            $response =  $res->getBody()->getContents();
            $data = json_decode($response);

            $usr = User::where('traccar_id',$id)->first();
            if($usr){
                $usr->basicAuth =  base64_encode($usr->email.":".$request->password);
                $usr->save();
            }

            //TODO Send mail to inform user that password has been changed

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

    public function openSession($token)
    {
        $client = new Client();
        $res = $client->request('GET', env('TRACCAR_API')."/session?token=".$token);

        $response =  $res->getBody()->getContents();
        $data = json_decode($response);

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }


}
