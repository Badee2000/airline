<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function index()
    {
        /*$flights = Flight::orderBy('from')
               ->limit(1)
               ->get();*/
           /*    $products = Product::paginate(5);

               return view('products.index-paging')->with('products', $products);*/

               $flights= Flight::paginate(2);
               return view('home', compact('flights'));
       /* $flights=Flight::all();
        return view('home',['flights'=>$flights]);*/
    }
    public function booking($from,$to,$id,$price,$date,$num_of_passengers)
    {

        return view('booking')->with('from', $from)->with('to', $to)->with('id',$id)->with('price',$price)->with('date',$date)->with('num_of_passengers',$num_of_passengers);
    }
    public function booki($from,$to,$id,$price,$date,$num_of_passengers){
        return view('confirmBooking')->with('from', $from)->with('to', $to)->with('id', $id)->with('price',$price)->with('date',$date)->with('num_of_passengers',$num_of_passengers);
        }
        public function bookii(Request $request){
            $userid = $request->input('userid');
            $flight_number = $request->input('flight_number');

         $name = $request->input('name');
        $from = $request->input('from');
        $to = $request->input('to');
        $price = $request->input('price');
        $date = $request->input('date');
        $data=array('userid'=>$userid,'flight_number'=>$flight_number,'name'=>$name,'from'=>$from,"to"=>$to,"price"=>$price,"date"=>$date);
        DB::table('books')->insert($data);
        return view('reserve');
        }
        public function deletebook($book)
        {
            Book::find($book)->delete();
            session()->flash('message',"Reservation Deleted Successfully !");
            return Redirect::to('http://127.0.0.1:8000/showflights');
        }
}
