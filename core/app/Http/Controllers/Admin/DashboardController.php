<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chart;
use Illuminate\Http\Request;
use App\Models\TableBook;
use App\Models\ProductOrder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard() {
      $data['table_books'] = TableBook::orderby('id','desc')->take(10)->get();
      $data['orders'] = ProductOrder::orderby('id','desc')->take(10)->get();

      return view('admin.dashboard', $data);
      
    }
}