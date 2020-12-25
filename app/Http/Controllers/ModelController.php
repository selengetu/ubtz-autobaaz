<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ModelController extends Controller {

   public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $model = DB::select('select * from CONST_CAR_MODEL');
        $mark = DB::select('select * from CONST_CAR_MARK');
        return view('setup.model',compact('model','mark'));
    }

    public function store(Request $request)
    {
        $model = new Model;
        $model->model_name = $request->model_name;
        $model->mark_id = $request->mark_id;
        $model->save();
        return Redirect('model');
    }

    public function update(Request $request)
    {
        $mark = DB::table('CONST_CAR_MARK')
            ->where('mark_id', $request->mark_id)
            ->update(['mark_name' =>  $request->mark_name]);
        return Redirect('mark');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mark::where('mark_id', '=', $id)->delete();
        return Redirect('mark');
    }
}
