<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Mark;
class MarkController extends Controller {

   public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $mark = DB::select('select * from CONST_CAR_MARK');
        
        return view('setup.mark',compact('mark'));
    }

    public function store(Request $request)
    {
        $mark = new Mark;
        $mark->mark_name = $request->mark_name;
        $mark->save();
        return Redirect('mark');
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
