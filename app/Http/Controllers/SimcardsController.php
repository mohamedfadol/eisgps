<?php

namespace App\Http\Controllers;

use App\Models\Simcards;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SimcardsController extends Controller
{

    public function all($page)
    {
        $client = new Client();
        $res = $client->request('GET', env('MOBILY_URL')."/devices?modifiedSince=2020-01-01T00%3A31%3A34%2B00%3A00&pageSize=50&pageNumber=".$page,
            [
                'headers' => [
                    'Authorization' => 'Basic '.base64_encode(env('MOBILY_USERNAME').":".env('MOBILY_KEY'))
                ],
            ]);

        $response =  $res->getBody()->getContents();
        $response = json_decode($response);


        $simsCard = $response->devices;


        return response()->json([
            'success' => true,
            'data'=>$simsCard,
            'page'=>$response->pageNumber,
            'isLastPage'=>$response->lastPage
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $simsCard = Simcards::where('device_id',null)->get();
        return response()->json([
            'success' => true,
            'data'=>$simsCard,
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
     * @param  \App\Models\Simcards  $simcards
     * @return \Illuminate\Http\Response
     */
    public function show(Simcards $simcards)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Simcards  $simcards
     * @return \Illuminate\Http\Response
     */
    public function edit(Simcards $simcards)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Simcards  $simcards
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Simcards $simcards)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Simcards  $simcards
     * @return \Illuminate\Http\Response
     */
    public function destroy(Simcards $simcards)
    {
        //
    }
}
