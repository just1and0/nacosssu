<?php

namespace App\Http\Controllers;
use App\Recorddate;
use App\Filled;
use App\User;
use App\Upload;
use Illuminate\Http\Request;
use \Exception;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\facades\Storage;


class FilledController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$day = "1";
    	$year = "2016";
    	return view('record.index',compact('day','year'));
    }

    public function fill(Request $Request)
    {
    	try{
    	$this->validate(Request(),[
    		'day' => 'required|integer',
    		'type' => 'required|string|min:5',
    		'month' => 'required|string|max:3',
    		'year' => 'required|integer',
            'areacommand' => 'required|string',
    		]);

    	$a = new Recorddate;
    	$a->dateset=$Request->day.'-'.$Request->month.'-'.$Request->year;
    	$a->type=$Request->type;
        $a->areacommand=$Request->areacommand;
    	$a->save();

    	$check = Recorddate::pluck('id')->last();
    	$check3="fill/".$check;

    	return redirect($check3);
    }
    catch(\Exception $e){
    	Session()->flash('message', 'Sorry, something went wrong!');
    	return back();
    }
    }


    public function fillnow(Recorddate $id)
    {

    	return view('record.fill',compact('id'));


    }

    public function save(Request $request)
    {

    	$this->validate(Request(),[
    			'suspectname' => 'required|string',
    			'suspectno' => 'required|integer',
    			'commodityname' => 'required|string',
          'location' => 'required|string',
          'dpv' => 'required|string',

    				]);

  //CONTAINER BAGS BALES PIECES LITERS UNITS OTHERS

    	$b =  new Filled;
    	$b->user_id=\Auth::user()->id;
    	$b->recorddate_id=$request->id;
    	$b->suspectname=$request->suspectname;
    	$b->suspectno=$request->suspectno;
    	$b->commodityname=$request->commodityname;
    	$b->quantity=$request->quantity;
        $b->dateinput=$request->setdate;
        $b->location=$request->location;
        $b->areacommand=$request->ac;
        $b->dpv=$request->dpv;
  	$b->save();

    	Session()->flash('success', 'record was added successfully!');
    	return back();
    }

    public function preview($id)
    {
    	$preview = Filled::all()->where('recorddate_id', $id);
    	$id1 = Recorddate::find($id);
    	return view('record.preview', compact('preview','id1','id'));
    }

    public function delete($id)
    {
    	$drop = Filled::find($id)->delete();
    Session()->flash('success', 'record was deleted successfully!');
    	return back();
    }

    public function done()
    {
    Session()->flash('done', 'YOUR RECORD WAS SAVED SUCCESSFULLY!');
    return redirect('home');
    }

    public function search()
    {
        return view('record.search');
    }

    public function specific()
    {
        $day = "1";
        $year = "2016";
        return view('search.specific', compact('day', 'year'));
    }

    public function searchresult(Request $request)
    {
        $this->validate(Request(),[
            'day' => 'required|integer',
            'month' => 'required|string|max:3',
            'year' => 'required|integer',
            ]);

        $id = $request->day.'-'.$request->month.'-'.$request->year;
        $preview = Filled::all()->where('dateinput', $id);

        $find  = Upload::where('date', $id)->get();

        //\DB::table('uploads')->where('date', $id)->pluck("filename");

        //Upload::pluck('filename')->where('date', $id);

        if ($find != "[]") {
        return view('search.specific_result',compact('preview','id','find'));

            }else{
        return view('search.specific_result1',compact('preview','id'));

            }
    }


    public function range()
  {

         $day = "1";
        $year = "2016";
        return view('search.range', compact('day', 'year'));

    }



    public function control()
    {
        $a = User::all();
        return view('admin.index', compact('a'));

    }

    public function adminremove($id)
    {
            $drop = User::find($id)->delete();
    Session()->flash('success', 'record was deleted successfully!');

        return redirect('/control');

    }
}
