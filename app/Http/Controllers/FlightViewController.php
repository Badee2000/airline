<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Flight;
use App\Http\Controllers\Controller;
class FlightViewController extends Controller
{
    public function showFlights()
    {
        $book= Book::all();
        $flight= Flight::all();
        return view('showMyFlights')->with('book', $book)->with('flight',$flight);
    }
    public function showFlightsAdmin()
    {
        $book= Book::all();
        return view('showFlightsAdmin')->with('book',$book);
    }
}
