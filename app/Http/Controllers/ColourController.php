<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Colour;
class ColourController extends Controller {

   public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $colour = DB::select('select * from CONST_CAR_COLOUR');
        
        return view('setup.colour',compact('colour'));
    }

    public function store(Request $request)
    {
        $colour = new Colour;
        $colour->colour_name = $request->colour_name;
        $colour->save();
        return Redirect('colour');
    }

    public function update(Request $request)
    {
        $colour = DB::table('CONST_CAR_COLOUR')
            ->where('colour_id', $request->colour_id)
            ->update(['colour_name' =>  $request->colour_name]);
        return Redirect('colour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Colour::where('colour_id', '=', $id)->delete();
        return Redirect('colour');
    }
}
