<?php

namespace App\Http\Controllers;

use App\Models\Command;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

class CommandController extends Controller
{

    public function index()
    {
        if(auth()->guard('api')->user()->isAdmin == true){
            $url = env('TRACCAR_API')."/commands?all=true";
        }else{
            $url =env('TRACCAR_API')."/commands";
        }

        $client = new Client();
        $res = $client->request('GET', $url,
            [
                'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
            ]);

        $response =  $res->getBody()->getContents();
        $data = json_decode($response);



        return response()->json([
            'success' => true,
            'data'=>$data,
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                "description" => 'required',
                "type" => 'required',
                "device" => 'required',

            ],[
                'description.required' => Lang::get('errors.description',[],$request->lang),
                'type.required' => Lang::get('errors.type',[],$request->lang),
                'device.required' => Lang::get('errors.device_protocol',[],$request->lang),

            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()->first()]);
        }


        try{
            $body =[
                "deviceId"=> 0,
                "description"=> $request->description,
                "type"=> $request->type,
                "textChannel"=> $request->sendSMS,
                "attributes"=> [
                    "data"=>$request->data
                ]
            ];
            $client = new Client();
            $res = $client->request('POST', env('TRACCAR_API')."/commands",
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth,'Content-Type' => 'application/json'],
                    'body'    => json_encode($body)

                ]);

            $response =  $res->getBody()->getContents();
            $data = json_decode($response);

            $cmd = new Command();
            $cmd->traccar_command_id = $data->id;
            $cmd->device_protocol = $request->device;
            $cmd->save();

            return response()->json([
                'success' => true,
                'message'=> Lang::get('valid.command_saved',[],$request->lang),
            ]);

        }catch (\Throwable $exception){
            return response()->json([
                'success' => false,
                'message'=>Lang::get('errors.failed',[],$request->lang),
                'error'=>$exception->getMessage()
            ]);
        }


    }


    public function show($id)
    {
        $client = new Client();
        $res = $client->request('GET', env('TRACCAR_API')."/commands/".$id,
            [
                'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
            ]);

        $response =  $res->getBody()->getContents();
        $data = json_decode($response);
        $cmd = Command::where('traccar_command_id',$id)->first();
        $data->device_protocol = null;
        if($cmd){
            $data->device = $cmd->device_protocol;
        }

        return response()->json([
            'success' => true,
            'data'=>$data,
        ]);
    }




    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [
                "description" => 'required',
                "type" => 'required',
                "device" => 'required',

            ],[
                'description.required' => Lang::get('errors.description',[],$request->lang),
                'type.required' => Lang::get('errors.type',[],$request->lang),
                'device.required' => Lang::get('errors.device_protocol',[],$request->lang),

            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()->first()]);
        }


        try{
            $body =[
                "id"=> $id,
                "deviceId"=> 0,
                "description"=> $request->description,
                "type"=> $request->type,
                "textChannel"=> $request->sendSMS,
                "attributes"=> [
                    "data"=>$request->data
                ]
            ];
            $client = new Client();
            $res = $client->request('PUT', env('TRACCAR_API')."/commands/".$id,
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth,'Content-Type' => 'application/json'],
                    'body'    => json_encode($body)

                ]);

            $response =  $res->getBody()->getContents();
            $data = json_decode($response);

            $cmd =Command::where('traccar_command_id',$id)->first();
            $cmd->device_protocol = $request->device;
            $cmd->save();

            return response()->json([
                'success' => true,
                'message'=> Lang::get('valid.command_saved',[],$request->lang),
                'data'=>$data
            ]);

        }catch (\Throwable $exception){
            return response()->json([
                'success' => false,
                'message'=>Lang::get('errors.failed',[],$request->lang),
                'error'=>$exception->getMessage()
            ]);
        }
    }


    public function destroy($id)
    {
        try {
            $client = new Client();
            $res = $client->request('DELETE', env('TRACCAR_API')."/commands/".$id,
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
                ]);


            $cmd = Command::where('traccar_command_id',$id)->first();
            if($cmd){
                $cmd->delete();
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
}
