<?php

namespace App\Http\Controllers;

use App\Models\Devices;
use App\Models\Vehicle;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = Vehicle::all();
        foreach ($data as $item){
            $item->company = $item->Owner();

            $device = Devices::where('traccar_device_id',$item->traccar_device_id)->first();
            if($device){
                $item->unique_id = $device->unique_id;
            }

        }

        return response()->json([
            'success' => true,
            'data'=>$data,
        ]);
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
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
       try{
           $car = Vehicle::find($id);

           $plateNum = explode(" ",$car->plate_number);
           $car->plateNum = $plateNum;

           $device = Devices::where('traccar_device_id',$car->traccar_device_id)->first();
           $car->unique_id = $device->unique_id;

           return response()->json([
               'success' => true,
               'data'=>$car,
           ]);
       }catch (\Throwable $exception){
           return response()->json([
               'success' => false,
               'message'=>$exception->getMessage(),
           ],$exception->getCode());
       }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
            [

                "plate_number" => 'required',
                "vehicle_serial_number" => 'required',
                "plate_type" => 'required',

            ],[

                'plate_number.required' => Lang::get('errors.plate_number',[],$request->lang),
                'vehicle_serial_number.required' => Lang::get('errors.vehicle_serial_number',[],$request->lang),
                'œplate_type.required' => Lang::get('errors.plate_type',[],$request->lang),

            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()->first()]);
        }

        try{
            $vehicle = Vehicle::find($id);
            $vehicle->code = $request->vehicle_code ?? null ;
            $vehicle->plate_number = $request->plate_number ;
            $vehicle->type = $request->vehicle_type ?? null ;
            $vehicle->manufacture = $request->manufacture_company ?? null ;
            $vehicle->model = $request->vehicle_model ?? null ;
            $vehicle->manufacture_year = $request->manufacturing_year ?? null ;
            $vehicle->color = $request->vehicle_color ?? null ;
            $vehicle->counter = $request->current_counter_reader ?? null ;
            $vehicle->fuel_type = $request->fuel_type ?? null ;
            $vehicle->fuel_cost = $request->fuel_cost ?? null ;
            $vehicle->fuel_consumption = $request->fuel_cons_liters ?? null ;
            $vehicle->tank_capacity = $request->tank_capacity ?? null ;
            $vehicle->plate_type = $request->plate_type ?? null ;
            $vehicle->insurance_type = $request->insurance_company ?? null ;
            $vehicle->insurance_number = $request->insurance_number ?? null ;
            $vehicle->serial_number = $request->vehicle_serial_number ?? null ;
            $vehicle->exp_library = $request->date_exp_library_form ?? null ;
            $vehicle->exam_date = $request->history_periodic_exam ?? null ;
            $vehicle->structure_number = $request->structure_no ?? null ;
            $vehicle->engine_serial_number = $request->engine_serial_number ?? null ;
            $vehicle->purchase_date = $request->purchase_date ??  null ;
            $vehicle->storage_box_capacity = $request->storage_box_capacity ?? null ;
            $vehicle->doors_number = $request->number_doors ?? null ;
            $vehicle->seats_number = $request->seats_number ?? null ;
            $vehicle->motion_vector = $request->motion_vector ?? null ;
            $vehicle->supplier = $request->supplier ?? null ;
            $vehicle->start_insurance_date = $request->start_insurance_date ?? null ;
            $vehicle->end_insurance_date = $request->end_insurance_date ?? null ;
            $vehicle->save();

            $device = Devices::where('traccar_device_id',$vehicle->traccar_device_id)->first();
            if($device){
                $device->unique_id = $request->imei;
                $device->save();
            }

            return response()->json([
                'success' => true,
                'message'=> Lang::get('valid.updated',[],$request->lang),
                'data'=>$vehicle,
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
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $car = Vehicle::find($id);

        if($car){
            $car->delete();
            return response()->json([
                'success' => true,

            ]);
        }
        return response()->json([
            'success' => false,

        ]);
    }
}
