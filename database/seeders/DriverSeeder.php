<?php

namespace Database\Seeders;

use App\Models\Driver;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
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
        $res = $client->request('GET', env('TRACCAR_API')."/drivers?all=true",
            [
                'headers' => ['Authorization' => 'Basic '.$basicAuth]
            ]);

        $response =  $res->getBody()->getContents();
        $data = json_decode($response);
        foreach ($data as $item){
            $find = Driver::where('traccar_device_id',$item->id)->first();
            if(!$find) {
                $group = new Driver();
                $group->traccar_driver_id = $item->id;
                $group->id_number = $item->uniqueId;
                $group->save();
            }
        }
    }
}
