<?php

namespace App\Http\Controllers;

use App\Models\Search;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {

        Cache::remember('logs', 10, function () {
            return Search::latest()
                ->paginate(10);
        });
        $logs = Cache::get('logs');
        Cache::remember('sumMoney', 10, function () {
            return Search::sum('money');
        });
        $sumMoney = Cache::get('sumMoney');
        return view('welcome', compact(['logs', 'sumMoney']));
    }
}
