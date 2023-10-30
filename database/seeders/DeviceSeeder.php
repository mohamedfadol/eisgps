<?php

namespace Database\Seeders;

use App\Models\Devices;
use App\Models\Simcards;
use App\Models\Vehicle;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $basicAuth = base64_encode("gps@eis.net.sa:Eis@1980");
        $client = new Client();
        $res = $client->request('GET', env('TRACCAR_API')."/devices?all=true",
            [
                'headers' => ['Authorization' => 'Basic '.$basicAuth]
            ]);

        $response =  $res->getBody()->getContents();
        $data = json_decode($response);
        foreach ($data as $item){
            $find = Devices::where('traccar_device_id',$item->id)->first();
            if(!$find) {
                $device = new Devices();
                $device->traccar_device_id = $item->id;
                $device->save();

                $car = new Vehicle();
                $car->plate_number = $item->name;
                $car->type = $item->category;
                $car->traccar_device_id = $item->id;
                $car->save();



            }
        }
    }
}
