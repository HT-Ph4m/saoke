<?php

namespace App\Http\Controllers;

use App\Models\Search;

class HomeController extends Controller
{
    public function index()
    {
        $logs = Search::latest()
            ->paginate(10);
        $sumMoney = Search::sum('money');
        return view('welcome', compact(['logs', 'sumMoney']));
    }
}
