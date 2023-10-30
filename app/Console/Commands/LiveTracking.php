<?php

namespace App\Console\Commands;

use App\Models\WaslDriver;
use App\Models\WaslVehicle;
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class LiveTracking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wasl:live';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sent locations of all status every 30 seconds';

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

                $to =new DateTime();
                $to = $to->format('Y-m-d\TH:i:s\Z');

                $date = new DateTime();
                date_sub($date, date_interval_create_from_date_string('30 seconds'));
                $from =  date_format($date, 'Y-m-d\TH:i:s\Z');


                $client = new Client();
                $res = $client->request('GET', env('TRACCAR_API')."/reports/events?deviceId=".$deviceId."&from=".$from."&to=".$to,
                    [
                        'headers' => ['Authorization' => 'Basic '.env('ADMIN_BASIC_AUTH')]
                    ]);

                $response =  $res->getBody()->getContents();

                $events = json_decode($response);

                if(count($events) != 0){
                    $myLastElement = end($events);

                    $position = $device->positionId;
                    $client = new Client();
                    $res = $client->request('GET', env('TRACCAR_API')."/positions?id=".$position,
                        [
                            'headers' => ['Authorization' => 'Basic '.env('ADMIN_BASIC_AUTH')]
                        ]);

                    $response =  $res->getBody()->getContents();
                    $myPosition = json_decode($response);
                    $myPosition = $myPosition[0];

                    switch ($myLastElement->type) {
                        case "deviceStopped":
                        case "ignitionOn":
                            $state_veh = "PARKED_ENGINE_ON";
                            break;
                        case "deviceUnknown":
                            $state_veh = "DEVICE_NO_SIGNAL";
                            break;
                        case "deviceMoving":
                            $state_veh = "MOVING";
                            break;
                        case "ignitionOff":
                            $state_veh = "PARKED_ENGINE_OFF";
                            break;
                        case "deviceInactive":
                            $state_veh = "DEVICE_NOT_WORKING";
                            break;
                        case "yyyy":
                            $state_veh = "TAMPER_WEIGHT";
                            break;
                        case "accident":
                            $state_veh = "ACCIDENT";
                            break;



                        default:
                            $state_veh = "DEVICE_NO_SIGNAL";
                    }
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
//                else{
//                   Log::channel('liveTracking')->info("--------NO EVENT IN 30 SEC--------------");
//                }

            }

            if(!empty($allLocations)){
                $liveLocation = [
                    "vehicleLocations" => $allLocations
                ];

                Log::channel('liveTracking')->info("----------LOCATION---LIVE--------");
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

                Log::channel('liveTracking')->info("----------RESPONSE--LOCATION---LIVE----------");
                Log::channel('liveTracking')->info(json_encode($dataVehLocation));
                Log::channel('liveTracking')->info("--------END---LOCATION---LIVE--------------");
            }


            $this->info('Successfully sent all status vehicles to Wasl.');
        }catch (\Throwable $exception){
            Log::channel('liveTracking')->info("--------ERROR-ON-LIVE--------------");
            Log::channel('liveTracking')->info($exception->getCode());
            Log::channel('liveTracking')->info($exception->getLine());
            Log::channel('liveTracking')->info($exception->getFile());
            Log::channel('liveTracking')->info($exception->getMessage());
        }
    }
}
