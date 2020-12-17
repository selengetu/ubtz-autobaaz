<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller {

   public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $job = DB::select('select * from CONST_JOBS');
        $park = DB::select('select * from CONST_PARKS');
        $part_service = DB::select('select * from CONST_PART_SERVICES');
        $service_type = DB::select('select * from CONST_SERVICE_TYPES t ');
        return view('car',compact('job', 'park','part_service', 'service_type'));
    }

    public function update_salary($salary_id, $column, $value) {
        $colName = static::$columns[$column-1];
        $query = 'update salary set '.$colName.'='.$value.' where salary_id='.$salary_id;
        DB::update($query);
        return $query; // for debug
    }
}
