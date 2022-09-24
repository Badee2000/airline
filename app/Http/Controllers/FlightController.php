<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Flight;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class FlightController extends Controller
{
    public function insertform(){
        return view('addflight');
        }
        public function insert(Request $request){
            $data = $request->validate([
                'from' => 'required|max:255|alpha',
                'to' => 'required|max:255|alpha',
                'price' => 'required|integer|min:1|max:999',
                'num_of_passengers' => 'required|integer|min:1|max:999',
                'date' =>'required'
            ]);
       /* $from = $request->input('from');
        $to = $request->input('to');
        $price = $request->input('price');
        $num_of_passengers = $request->input('num_of_passengers');
        $date = $request->input('date');
        $data=array('from'=>$from,"to"=>$to,"price"=>$price,"num_of_passengers"=>$num_of_passengers,"date"=>$date);
        */DB::table('flights')->insert($data);
        return view('Add');
        }
        public function deleteflight($flight)
        {
            Flight::find($flight)->delete();
            session()->flash('message',"Flight Deleted Successfully !");
            return Redirect::to('http://127.0.0.1:8000/home');
        }
}
