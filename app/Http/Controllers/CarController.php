<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Mark;
class CarController extends Controller {

   public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $car = DB::select('select * from CARS');
        $mark = DB::select('select * from CONST_CAR_MARK');
        $model = DB::select('select * from CONST_CAR_MODEL');
        $park = DB::select('select * from CONST_PARKS');
        $oil = DB::select('select * from CONST_OIL_TYPE');
        $colour = DB::select('select * from CONST_CAR_COLOUR');
        $type = DB::select('select * from CONST_VEHICLE_TYPES');
        return view('car',compact('car','mark','model','park','oil','colour','type'));
    }

    public function store(Request $request)
    {
        $car = new Car;
        $car->vtypecode = $request->vtypecode;
        $car->parkid = $request->parkid;
        $car->vinno = $request->vinno;
        $car->carno = $request->carno;
        $car->mark = $request->mark;
        $car->enginecc = $request->enginecc;
        $car->speedbox = $request->speedbox;
        $car->manuyear = $request->manuyear;
        $car->technote = $request->technote;
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
}
