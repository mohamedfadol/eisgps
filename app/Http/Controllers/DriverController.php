<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        if(auth()->guard('api')->user()->isAdmin == true){
            $url = env('TRACCAR_API')."/drivers?all=true";
        }else{
            $url = env('TRACCAR_API')."/drivers";
        }

        $client = new Client();
        $res = $client->request('GET', $url,
            [
                'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
            ]);

        $response =  $res->getBody()->getContents();
        $data = json_decode($response);

        foreach ($data as $item){
            $driver = Driver::where('traccar_driver_id',$item->id)->first();

            $item->driver = new \stdClass();
            if($driver){
                $item->driver = $driver;
                $item->companyName = $driver->Owner();
            }
        }


        return response()->json([
            'success' => true,
            'data'=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $client = new Client();
            $res = $client->request('GET', env('TRACCAR_API')."/drivers/".$id,
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
                ]);

            $response =  $res->getBody()->getContents();
            $data = json_decode($response);

            $driver = Driver::where('traccar_driver_id',$data->id)->first();
            if($driver){
                $data->driver = $driver;
                $data->owner = $driver->Owner();
            }else{
                $data->owner = null;
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),
            [
                "driver_id_number" => 'required',
                "driver_birthday" => 'required',
                "driver_mobile" => 'required',
                "full_name" => 'required',

            ],[
                'driver_id_number.required' => Lang::get('errors.ident_number',[],$request->lang),
                'driver_birthday.required' => Lang::get('errors.driver_birthday',[],$request->lang),
                'driver_mobile.required' => Lang::get('errors.driver_mobile',[],$request->lang),
                'full_name.required' => Lang::get('errors.driver_full_name',[],$request->lang),
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()->first()]);
        }

        try {

            $body5 = [
                'id'=> $id,
                'name'=> $request->full_name,
                'uniqueId'=> $request->driver_id_number,
            ];
            $client = new Client();
            $res = $client->request('PUT', env('TRACCAR_API')."/drivers/".$id,
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth,'Content-Type' => 'application/json'],
                    'body'    => json_encode($body5)

                ]);

            $response =  $res->getBody()->getContents();
            $driverData = json_decode($response);

            $driver = Driver::where('traccar_driver_id',$id)->first();

            $driver->birthday=$request->driver_birthday ?? null ;
            $driver->gender=$request->driver_gender ?? null;
            $driver->email=$request->driver_email ?? null;
            $driver->phone = $request->driver_mobile ?? null;
            $driver->nationality = $request->driver_nationality ?? null;
            $driver->licence_type = $request->driver_licence_type ?? null;
            $driver->date_licence = $request->driver_date_issuance ?? null;
            $driver->exp_date_licence = $request->driver_license_expiration ?? null;
            $driver->id_number = $request->driver_id_number ?? null;
            $driver->save();

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
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        //
    }

    public function driverByDevice($id)
    {
        $client = new Client();
        $res = $client->request('GET', env('TRACCAR_API')."/drivers?deviceId=".$id,
            [
                'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
            ]);

        $response =  $res->getBody()->getContents();
        $data = json_decode($response);
        if(sizeof($data) > 0){
            $data = $data[0];
            $driver = Driver::where('traccar_device_id',$id)
                ->where('traccar_driver_id',$data->id)
                ->first();
            $data->driver = $driver;
        }else{
            $data = array();
        }



        return response()->json([
            'success' => true,
            'data'=>$data,
        ]);

    }
}
