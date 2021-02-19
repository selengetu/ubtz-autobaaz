<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;
use App\Mark;
use App\Car;
use App\CarDriver;
class CarController extends Controller {

   public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $car = DB::select('select * from V_CARS');
        $mark = DB::select('select * from CONST_CAR_MARK');
        $model = DB::select('select * from CONST_CAR_MODEL');
        $park = DB::select('select * from CONST_PARKS');
        $oil = DB::select('select * from CONST_OIL_TYPE');
        $colour = DB::select('select * from CONST_CAR_COLOUR');
        $speedbox = DB::select('select * from CONST_CAR_SPEEDBOX');
        $type = DB::select('select * from CONST_VEHICLE_TYPES');
        $product = DB::select('select * from CONST_PRODUCT');
        $driver = DB::select('select * from CONST_DRIVER');
        return view('car',compact('car','mark','model','park','oil','colour','type','speedbox','product','driver'));
    }

    public function store(Request $request)
    {
        
        $car = new Car;
        $car->vtypecode = $request->vtypecode;
        $car->parkid =1;
        $car->vinno = $request->vinno;
        $car->carno = $request->carno;
        $car->mark = $request->mark;
        $car->colour_id = $request->colour;
        $car->model = $request->model_id;
        $car->enginecc = $request->enginecc;
        $car->speedbox = $request->speedbox;
        $car->manuyear = $request->manuyear;
        $car->technote = $request->technote;
        $car->speedcap = $request->speedcap;
        $car->speedtype = $request->speedtype;
        $car->engineid = $request->engineid;
        $car->enginecap = $request->enginecap;
        $car->enginetype = $request->enginetype;
        $car->save();
        return Redirect('car');
    }

    public function update(Request $request)
    {
        $car = DB::table('CARS')
            ->where('carid', $request->carid)
            ->update(['vtypecode' =>  $request->vtypecode,'parkid' =>  $request->parkid,'vinno' =>  $request->vinno,'carno' =>  $request->carno,
            'mark' =>  $request->mark, 'enginecc' =>  $request->enginecc, 'manuyear' =>  $request->manuyear, 'speedbox' =>  $request->speedbox, 'technote' =>  $request->technote]);
        return Redirect('car');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::where('carid', '=', $id)->delete();
        return Redirect('car');
    }
    

    public function storecardriver(Request $request)
    {
    
        $car = new CarDriver;
        $car->car_id = $request->gcar;
        $car->sdate =Carbon\Carbon::parse($request->sdate)->format('Y-m-d');
        $car->fdate =Carbon\Carbon::parse($request->fdate)->format('Y-m-d');
        $car->driver_id = $request->driver_id;
        $car->save();
        return Redirect('car');
    }

    public function updatecardriver(Request $request)
    {
       
        $car = DB::table('CAR_DRIVER')
            ->where('cd_id', $request->cd_id)
            ->update(['sdate' =>  Carbon\Carbon::parse($request->sdate)->format('Y-m-d'),'fdate' =>Carbon\Carbon::parse($request->fdate)->format('Y-m-d'),'driver_id' =>$request->driver_id]);
        return Redirect('car');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroycardriver($id)
    {
        CarDriver::where('cd_id', '=', $id)->delete();
        return Redirect('car');
    }

    public function storecarproduct(Request $request)
    {
    
        $car = new CarProduct;
        $car->car_id = $request->pcar;
        $car->begin_date =Carbon\Carbon::parse($request->product_sdate)->format('Y-m-d');
        $car->end_date =Carbon\Carbon::parse($request->product_fdate)->format('Y-m-d');
        $car->product_id = $request->product_id;
        $car->km = $request->product_km;
        $car->save();
        return Redirect('car');
    }

    public function updatecarproduct(Request $request)
    {
       
        $car = DB::table('CAR_PRODUCT')
            ->where('cp_id', $request->cp_id)
            ->update(['begin_date' =>  Carbon\Carbon::parse($request->product_sdate)->format('Y-m-d'),'end_date' =>Carbon\Carbon::parse($request->product_fdate)->format('Y-m-d'),
            'product_id' =>$request->product_id,'km' =>$request->product_km]);
        return Redirect('car');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroycarproduct($id)
    {
        CarProduct::where('cp_id', '=', $id)->delete();
        return Redirect('car');
    }
}
