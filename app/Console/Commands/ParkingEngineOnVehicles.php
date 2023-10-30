<?php

namespace App\Console\Commands;

use App\Models\WaslDriver;
use App\Models\WaslVehicle;
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ParkingEngineOnVehicles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wasl:parked_on';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sent locations of all Parking and engine on vehicles every 2 minutes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $allVehicles = WaslVehicle::all();

            $allLocations = array();
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
                $myPosition= $myPosition[0];
                $ignition = $myPosition->attributes->ignition;

                $motion = $myPosition->attributes->motion;

                if($ignition == true && $motion == false){

                    $state_veh = "PARKED_ENGINE_ON";

                    $deviceTime =new DateTime('NOW');
                    $deviceTime = $deviceTime->format('Y-m-d\TH:i:s.v\Z');

                    if($myPosition->latitude != 0 && $myPosition->longitude != 0){
                        $client = new Client();
                        //$res = $client->request('GET', env("GOOGLE_GEOCODE")."?latlng=".$myPosition->latitude.",".$myPosition->longitude."&key=".env('GOOGLE_API_KEY')."&language=ar");
                        $res = $client->request('GET', env("GEOCODE_URL")."".$myPosition->latitude.",".$myPosition->longitude."&lang=ar-AR&apiKey=".env('GEOCODE_APIKEY'));
                        $response =  $res->getBody()->getContents();
                        $geocode = json_decode($response);
                        //$location = $geocode->results[0]->formatted_address;
                        $location = $geocode->items[0]->title;
                    }else{
                        $location = "";
                    }
                    $allLocations[] = [
                        "referenceKey"=>$waslVehicleId,
                        "driverReferenceKey"=>$waslDriverId,
                        "latitude"=>$myPosition->latitude,
                        "longitude"=> $myPosition->longitude,
                        "velocity"=> $myPosition->speed,
                        "weight"=> $myPosition->attributes->adc1,
                        "locationTime" => $deviceTime,
                        "vehicleStatus"=> $state_veh,
                        "address"=> $location ?? "السعودية",
                        "roleCode"=>"T1",
                    ];

                }
            }
            if(!empty($allLocations)){
                $liveLocation = [
                    "vehicleLocations" => $allLocations
                ];

                Log::channel('liveTracking')->info("----------LOCATION---PARKED---ENGINE--ON---");
                Log::channel('liveTracking')->info(json_encode($liveLocation));

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
                Log::channel('liveTracking')->info("----------RESPONSE--LOCATION---PARKED---ENGINE--ON----------");
                Log::channel('liveTracking')->info(json_encode($dataVehLocation));
                Log::channel('liveTracking')->info("--------END---LOCATION---PARKED---ENGINE--ON--------------");
            }
            $this->info('Successfully sent all parking and engine on vehicles to Wasl.');
        }catch (\Throwable $exception){
            Log::channel('liveTracking')->info("--------ERROR-ON--PARKED--ENGINE--ON-------------");
            Log::channel('liveTracking')->info($exception->getCode());
            Log::channel('liveTracking')->info($exception->getLine());
            Log::channel('liveTracking')->info($exception->getFile());
            Log::channel('liveTracking')->info($exception->getMessage());
        }
    }
}
