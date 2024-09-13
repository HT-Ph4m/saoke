<?php

namespace App\Http\Controllers;

use App\Models\Search;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $logs = Search::latest()
            ->paginate(10);
        return view('welcome', compact('logs'));
    }
}
