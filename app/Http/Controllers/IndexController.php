<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Books_Action;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {

        $unreturnedBooks = Books_Action::sum('count');
        $availableBooks = Book::sum('count_of_items');

        Carbon::setLocale('ru');
        $startDate = Carbon::now()->subMonths(2);
        $middleDate = Carbon::now()->subMonths(1);
        $endDate = Carbon::now();


        $threeMonthsAgo = Books_Action::whereMonth('get_date', $startDate)->get()->count();
        $twoMonthsAgo = Books_Action::whereMonth('get_date', $middleDate)->get()->count();
        $thisMonths = Books_Action::whereMonth('get_date', $endDate)->get()->count();

        return view('index', compact('unreturnedBooks' ,'availableBooks', 'threeMonthsAgo', 'twoMonthsAgo', 'thisMonths', 'startDate','middleDate','endDate'));


    }
}
