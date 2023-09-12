<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Train;

class TrainController extends Controller
{
    public function index() 
    {
        $currentDate = Carbon::now();
        $trains = Train::whereDate('orario_partenza', '>=', $currentDate)->get();

        return view('trains.index', compact('trains'));
    }
}
