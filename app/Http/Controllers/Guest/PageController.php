<?php

namespace App\Http\Controllers\Guest;

use App\Models\Train;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $trains = Train::query();

        /* filter request */
        if ($request->has('start_date') && $request->has('end_date')) {
            $startDate = $request->start_date;
            $endDate = $request->end_date;
            $trains->whereBetween('departure_date', [$startDate, $endDate]);
        }

        /* reset request */
        if ($request->has('reset')) {
            return redirect()->route('welcome');
        }
        /* pagination */
        $trains = $trains->paginate(6);

        return view('guests.welcome', compact('trains'));
    }
}
