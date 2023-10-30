<?php

namespace Database\Seeders;

use App\Models\Groups;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
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
        $res = $client->request('GET', env('TRACCAR_API')."/groups?all=true",
            [
                'headers' => ['Authorization' => 'Basic '.$basicAuth]
            ]);

        $response =  $res->getBody()->getContents();
        $data = json_decode($response);
        foreach ($data as $item){
            $find = Groups::where('traccar_group_id',$item->id)->first();
            if(!$find) {
                $group = new Groups();
                $group->traccar_group_id = $item->id;

                $group->save();
            }
        }
    }
}
