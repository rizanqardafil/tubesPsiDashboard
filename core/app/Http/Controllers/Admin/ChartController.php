<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use app\Models\Chart;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ChartController extends Controller{
    
    public function index(){

        $users = DB::table('product_orders')
                ->select(DB::raw("CAST(SUM(total) as int) as total"))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('total');
        $month = DB::table('product_orders')
                ->select(DB::raw('Month(created_at) as month'))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month');
        
        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);

        foreach($month as $index => $month){
            $datas[$month] = $users[$index];
        }

        $totalOrder = DB::table('product_orders')
        ->select(DB::raw("CAST(count(id) as int) as id"))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('id');

        $month = DB::table('product_orders')
        ->select(DB::raw('Month(created_at) as month'))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('month');

        $array = array(0,0,0,0,0,0,0,0,0,0,0,0);

        foreach ($month as $index => $month){
            $array[$month] = $totalOrder[$index];
        }

            
        return view('admin.statistic.index', ['datas' => $datas, 'array' => $array]);
    }
}