<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(TransactionRequest $request)
    {
        Transaction::create([
            'user_id' => 1,
            'book_id' => $request->book_id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'card_number' => $request->card_number,
            'expiry' => $request->expiry,
            'cvc' => $request->cvc,
            'is_paid' => false,
            'status' => 'pending',
            'created_at' => now(),
        ]);

        return $this->json('Transaction successfully Created', 201);
    }
}
