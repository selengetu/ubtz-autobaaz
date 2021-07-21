<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;
use App\Mark;
use App\Car;
use App\CarDriver;
use App\CarProduct;
use App\CarRepair;
use Illuminate\Support\Facades\Input;
use Session;
class CarController extends Controller {

   public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $query = "";
        $vtypecode = Input::get('s_vtypecode');
        $s_mark = Input::get('s_mark');
        $s_parkid = Input::get('s_parkid');
        $s_model = Input::get('s_model_id');
        $s_speedbox = Input::get('s_speedbox');
        if(Session::has('vtypecode')) {
            $vtypecode = Session::get('vtypecode');

        }
        else {
            Session::put('vtypecode', $vtypecode);
        }

        if ($vtypecode!=NULL && $vtypecode !=0) {
            $query.=" and vtypecode = '".$vtypecode."'";

        }
        else
        {
            $query.=" ";
        }
        if(Session::has('s_parkid')) {
            $s_parkid = Session::get('s_parkid');

        }
        else {
            Session::put('s_parkid', $s_parkid);
        }

        if ($s_parkid!=NULL && $s_parkid !=0) {
            $query.=" and parkid = '".$s_parkid."'";

        }
        else
        {
            $query.=" ";
        }

        if(Session::has('mark')) {
            $s_mark = Session::get('mark');

        }
        else {
            Session::put('mark', $s_mark);
        }

        if ($s_mark!=NULL && $s_mark !=0) {
            $query.=" and mark = '".$s_mark."'";

        }
        else
        {
            $query.=" ";
        }
        if(Session::has('model')) {
            $s_model = Session::get('model');

        }
        else {
            Session::put('model', $s_model);
        }

        if ($s_model!=NULL && $s_model !=0) {
            $query.=" and model = '".$s_model."'";

        }
        else
        {
            $query.=" ";
        }
        if(Session::has('s_speedbox')) {
            $s_speedbox = Session::get('s_speedbox');

        }
        else {
            Session::put('s_speedbox', $s_speedbox);
        }

        if ($s_speedbox!=NULL && $s_speedbox !=0) {
            $query.=" and speedbox = '".$s_speedbox."'";

        }
        else
        {
            $query.=" ";
        }
 
        $car = DB::select('select * from V_CARS where 1=1 ' .$query.' order by carid');
        $mark = DB::select('select * from CONST_CAR_MARK');
        $model = DB::select('select * from CONST_CAR_MODEL');
        $park = DB::select('select * from CONST_PARKS');
        $engine = DB::select('select * from CONST_OIL_TYPE');
        $colour = DB::select('select * from CONST_CAR_COLOUR');
        $speedbox = DB::select('select * from CONST_CAR_SPEEDBOX');
        $type = DB::select('select * from CONST_VEHICLE_TYPES');
        $product = DB::select('select * from CONST_PRODUCT');
        $driver = DB::select('select * from CONST_DRIVER');

        return view('car',compact('car','mark','model','park','engine','colour','type','speedbox','product','driver','vtypecode','s_speedbox','s_mark','s_model','s_parkid'));
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
        $car->enginemaintype = $request->enginemaintype;
        $car->save();
        return Redirect('car');
    }

    public function update(Request $request)
    {
      
        $car = DB::table('CARS')
            ->where('carid', $request->car_id)
            ->update(['vtypecode' =>  $request->vtypecode,'vinno' =>  $request->vinno,'carno' =>  $request->carno, 'speedid' =>  $request->oil_id,
            'mark' =>  $request->mark, 'enginecc' =>  $request->enginecc, 'manuyear' =>  $request->manuyear, 'speedbox' =>  $request->speedbox, 'technote' =>  $request->technote,
            'colour_id' =>  $request->colour,'model' =>  $request->model_id,'speedcap' =>  $request->speedcap,'speedtype' =>  $request->speedtype,'engineid' =>  $request->engineid
            ,'enginecap' =>  $request->enginecap,'enginemaintype' =>  $request->enginemaintype]);
        return Redirect('car');
    }
    public function updatetos(Request $request)
    {
      
        $car = DB::table('CARS')
            ->where('carid', $request->ct_id)
            ->update([ 'speedid' =>  $request->speedid, 'speedbox' =>  $request->speedbox,'speedcap' =>  $request->speedcap,'speedtype' =>  $request->speedtype]);
        return Redirect('car');
    }
    public function updatehud(Request $request)
    {
      
        $car = DB::table('CARS')
            ->where('carid', $request->ch_id)
            ->update(['enginetype' =>  $request->enginetype, 'enginecc' =>  $request->enginecc, 'engineid' =>  $request->engineid,'enginecap' =>  $request->enginecap,'enginemaintype' =>  $request->enginemaintype]);
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
      
    }

    public function updatecardriver(Request $request)
    {
       
        $car = DB::table('CAR_DRIVER')
            ->where('cd_id', $request->cd_id)
            ->update(['sdate' =>  Carbon\Carbon::parse($request->sdate)->format('Y-m-d'),'fdate' =>Carbon\Carbon::parse($request->fdate)->format('Y-m-d'),'driver_id' =>$request->driver_id]);
      
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

    

    public function storecarrepair(Request $request)
    {
    
        $car = new CarRepair;
        $car->car_id = $request->rcar;
        $car->repair_date =Carbon\Carbon::parse($request->repair_date)->format('Y-m-d');
        $car->repair_personid = $request->repair_personid;
        $car->repair_km = $request->repair_km;
        $car->repair_personid = $request->repair_personid;
        $car->repair_comment = $request->repair_comment;
        $car->product_id = $request->rproduct_id;
        $car->save();
        return Redirect('car');
    }

    public function updatecarrepair(Request $request)
    {
       
        $car = DB::table('CAR_REPAIR')
            ->where('cr_id', $request->cr_id)
            ->update(['repair_date' =>  Carbon\Carbon::parse($request->repair_date)->format('Y-m-d'),'repair_km' =>$request->repair_km,'repair_comment' =>$request->repair_comment, 
                    'repair_personid' =>$request->repair_personid,'product_id' =>$request->rproduct_id]);
        return Redirect('car');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroycarrepair($id)
    {
        CarRepair::where('cr_id', '=', $id)->delete();
        return Redirect('car');
    }
    public function filter_speedbox($s_speedbox) {
        Session::put('s_speedbox',$s_speedbox);
        return back();
    }
    public function filter_mark($mark) {
        Session::put('mark',$mark);
        return back();
    }
    public function filter_model($model) {
        Session::put('model',$model);
        return back();
    }
    public function filter_vtypecode($vtypecode) {
        Session::put('vtypecode',$vtypecode);
        return back();
    }
    public function filter_park($s_park) {
        Session::put('s_park',$s_park);
        return back();
    }
  
}
