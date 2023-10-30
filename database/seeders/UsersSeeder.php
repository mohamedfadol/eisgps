<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
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
        $res = $client->request('GET', env('TRACCAR_API')."/users",
            [
                'headers' => ['Authorization' => 'Basic '.$basicAuth]
            ]);

        $response =  $res->getBody()->getContents();
        $data = json_decode($response);
        foreach ($data as $item){
            $find = User::where('traccar_id',$item->id)->first();
            if(!$find) {
                if($item->expirationTime){
                    $dateExp = explode('T',$item->expirationTime);
                }else{
                    $dateExp[0] = null;
                }


                $user = new User();
                $user->traccar_id = $item->id;
                $user->name = $item->name;
                $user->email = $item->email;
                $user->mobile = $item->phone;
                $user->expiry_date = $dateExp[0];
                $user->isAdmin = $item->administrator;;
                $user->save();
            }
        }
    }
}
