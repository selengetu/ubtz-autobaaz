<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\CModel;
class ModelController extends Controller {

   public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $model = DB::select('select * from V_CONST_CAR_MODEL');
        $mark = DB::select('select * from CONST_CAR_MARK');
        return view('setup.model',compact('model','mark'));
    }

    public function store(Request $request)
    {
        $model = new CModel;
        $model->model_name = $request->model_name;
        $model->mark_id = $request->mark_id;
        $model->save();
        return Redirect('model');
    }

    public function update(Request $request)
    {
        $mark = DB::table('CONST_CAR_MODEL')
            ->where('model_id', $request->model_id)
            ->update(['model_name' =>  $request->model_name,'mark_id' =>  $request->mark_id]);
        return Redirect('model');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CModel::where('model_id', '=', $id)->delete();
        return Redirect('model');
    }
}
