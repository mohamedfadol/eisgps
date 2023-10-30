<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TraccarController extends Controller
{

    public function server(Request $request)
    {

        try {
            $client = new Client();
            $res = $client->request('GET', env('TRACCAR_API')."/server",
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
                ]);

            $response =  $res->getBody()->getContents();
            $data = json_decode($response);

            return response()->json([
                'success' => true,
                'data'=>$data,
            ]);
        }catch (\Throwable $exception){
            return response()->json([
                'success' => false,
                'error'=>$exception->getMessage(),
            ],500);
        }

    }

    public function positions()
    {

        try {
            $client = new Client();
            $res = $client->request('GET', env('TRACCAR_API')."/positions",
                [
                    'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
                ]);

            $response =  $res->getBody()->getContents();
            $data = json_decode($response);

            $parkedCars = 0;
            $movingCars = 0;

            foreach ($data as $pos){

                if($pos->speed == 0 || $pos->speed == null){
                    $parkedCars+= 1;
                }
                if($pos->speed != 0 || $pos->speed != null){
                    $movingCars += 1;
                }



            }

            $stat = [
                'parkedCars' => $parkedCars,
                'movingCars' => $movingCars,
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
            ]);
        }

    }

    public function positionById($id)
    {

        $client = new Client();
        $res = $client->request('GET', env('TRACCAR_API')."/positions?id=".$id,
            [
                'headers' => ['Authorization' => 'Basic '.auth()->guard('api')->user()->basicAuth]
            ]);

        $response =  $res->getBody()->getContents();
        $data = json_decode($response);

        return response()->json([
            'success' => true,
            'data'=>$data[0],
        ]);

    }


    public function getNotifications()
    {
        if(auth()->guard('api')->user()->isAdmin == true){
            $url = env('TRACCAR_API')."/notifications?all=true";
        }else{
            $url = env('TRACCAR_API')."/notifications";
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



}
