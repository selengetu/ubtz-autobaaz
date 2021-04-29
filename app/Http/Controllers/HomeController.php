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

class HomeController extends Controller {

   public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $query = "";
        $vtypecode = Input::get('s_vtypecode');
        $s_mark = Input::get('s_mark');
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
        if(Session::has('speedbox')) {
            $s_speedbox = Session::get('speedbox');

        }
        else {
            Session::put('speedbox', $s_speedbox);
        }

        if ($s_speedbox!=NULL && $s_speedbox !=0) {
            $query.=" and speedbox = '".$s_speedbox."'";

        }
        else
        {
            $query.=" ";
        }
        $report = DB::select('select t.*, c.*, p.product_name from V_CAR_REPAIR t, V_CARS c, const_product p
        where c.carid= t.car_id and t.product_id=p.product_id ' .$query.'');
        $mark = DB::select('select * from CONST_CAR_MARK');
        $model = DB::select('select * from CONST_CAR_MODEL');
        $park = DB::select('select * from CONST_PARKS');
        $oil = DB::select('select * from CONST_OIL_TYPE');
        $colour = DB::select('select * from CONST_CAR_COLOUR');
        $speedbox = DB::select('select * from CONST_CAR_SPEEDBOX');
        $type = DB::select('select * from CONST_VEHICLE_TYPES');
        $product = DB::select('select * from CONST_PRODUCT');
        $driver = DB::select('select * from CONST_DRIVER');

        return view('report.rep1',compact('report','mark','model','park','oil','colour','type','speedbox','product','driver','vtypecode','s_speedbox','s_mark','s_model'));
       
        
     
    }
}
