<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MarkController extends Controller {

   public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $mark = DB::select('select * from CONST_CAR_MARK');
        
        return view('setup.mark',compact('mark'));
    }

    public function update_salary($salary_id, $column, $value) {
        $colName = static::$columns[$column-1];
        $query = 'update salary set '.$colName.'='.$value.' where salary_id='.$salary_id;
        DB::update($query);
        return $query; // for debug
    }
}
