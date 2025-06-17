<?php

namespace App\Http\Controllers\WebAdmin;

use App\Events\SentBookEvent;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::get();

        return view('dashboard.transaction.index', compact('transactions'));
    }

    public function acceptTransaction(Transaction $transaction)
    {
        $transaction->update([
            'status' => 'completed',
            'is_paid' => true
        ]);

        SentBookEvent::dispatch($transaction);

        return redirect()->route('admin.transactions.index')->with('success', 'Transaction accepted successfully');
    }

    public function delete(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('admin.transactions.index')->with('success', 'Transaction deleted successfully');
    }
}
