<?php

namespace App\Http\Controllers;

use App\Models\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $dateFrom = $request->input('dateFrom', null);
        $dateTo = $request->input('dateTo', null);
        $number = $request->input('number', null);
        $name = $request->input('name', null);
        $content = $request->input('content', null);

        // Chuyển đổi ngày từ định dạng yyyy-mm-dd sang d/m/Y
        $dateFrom = $dateFrom ? \Carbon\Carbon::createFromFormat('Y-m-d', $dateFrom)->format('d/m/Y') : null;
        $dateTo = $dateTo ? \Carbon\Carbon::createFromFormat('Y-m-d', $dateTo)->format('d/m/Y') : null;

        $query = Search::query();

        // Xử lý ngày tháng
        if ($dateFrom) {
            $dateFrom = \Carbon\Carbon::createFromFormat('d/m/Y', $dateFrom)->format('Y-m-d') . ' 00:00:00';
        }

        if ($dateTo) {
            $dateTo = \Carbon\Carbon::createFromFormat('d/m/Y', $dateTo)->format('Y-m-d') . ' 23:59:59';
        }

        // Áp dụng các điều kiện tìm kiếm
        if ($dateFrom && $dateTo) {
            $query->whereRaw("STR_TO_DATE(date, '%d/%m/%Y %H:%i:%s') BETWEEN ? AND ?", [$dateFrom, $dateTo]);
        } elseif ($dateFrom) {
            $query->whereRaw("STR_TO_DATE(date, '%d/%m/%Y %H:%i:%s') >= ?", [$dateFrom]);
        } elseif ($dateTo) {
            $query->whereRaw("STR_TO_DATE(date, '%d/%m/%Y %H:%i:%s') <= ?", [$dateTo]);
        }

        if ($number) {
            $query->where('money', $number);
        }

        if ($name) {
            $query->where('username', 'like', "%{$name}%");
        }

        if ($content) {
            $query->where('note', 'like', "%{$content}%");
        }

        // Lấy dữ liệu và phân trang
        $logs = $query->latest()->paginate(10);

        // Trả về view với dữ liệu tìm kiếm
        return view('partical.sao_ke_table', compact('logs'));
    }
}
