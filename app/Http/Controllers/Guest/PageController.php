<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Train;

class PageController extends Controller
{
    public function index(Request $request){
        $trains = Train::all();

        if ($request->has('start_date') && $request->has('end_date')) {
            $startDate = $request->start_date;
            $endDate = $request->end_date;
            $trains = Train::whereBetween('departure_date', [$startDate, $endDate])->get();
        }

        if($request->has('reset')) {
            return redirect()->route('welcome');
        }

        return view('guests.welcome', compact('trains'));
    }

}
