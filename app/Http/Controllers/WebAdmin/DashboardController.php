<?php

namespace App\Http\Controllers\WebAdmin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::count();
        $totalCategory = Category::where('status', true)->count();
        $totalBook = Book::where('status', true)->count();
        $totalTransaction = Transaction::where('status', 'completed')->where('is_paid', true)->count();
        $totalPendingTransaction = Transaction::where('status', 'pending')->where('is_paid', false)->count();
        return view('dashboard.home.index', compact(
            'totalUser',
            'totalCategory',
            'totalBook',
            'totalTransaction',
            'totalPendingTransaction'
        ));
    }
}
