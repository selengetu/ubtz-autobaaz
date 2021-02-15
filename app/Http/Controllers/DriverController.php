<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Driver;
class DriverController extends Controller {

   public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $driver = DB::select('select * from CONST_DRIVER');
        
        return view('setup.driver',compact('driver'));
    }

    public function store(Request $request)
    {
        $driver = new Driver;
        $driver->driver_name = $request->driver_name;
        $driver->driver_type = $request->driver_type;
        $driver->driver_spec = $request->driver_spec;
        $driver->driver_begin = $request->driver_begin;
        $driver->driver_code = $request->driver_code;
        $driver->save();
        return Redirect('driver');
    }

    public function update(Request $request)
    {
        $mark = DB::table('CONST_DRIVER')
            ->where('driver_id', $request->driver_id)
            ->update(['driver_name' =>  $request->driver_name,'driver_type' =>  $request->driver_type,
                     'driver_spec' =>  $request->driver_spec,'driver_begin' =>  $request->driver_begin,
                     'driver_code' =>  $request->driver_code]);
        return Redirect('driver');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mark::where('driver_id', '=', $id)->delete();
        return Redirect('driver');
    }
}
