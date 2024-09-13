<?php

namespace App\Http\Controllers;

use App\Models\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $logs = [];
        $keyWord = $request->input('keyword', null);
        if ($keyWord) {
            $logs = Search::where('money', 'LIKE', "%{$keyWord}%")
                ->orWhere('note', 'LIKE', "%{$keyWord}%")
                ->latest()
                ->paginate(10);
        }
        return view('partical.sao_ke_table', compact('logs'));
    }
}
