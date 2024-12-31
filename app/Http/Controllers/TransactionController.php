<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\PaymentMethod;
use App\Models\product;
use Illuminate\Http\Request;

class TransactionController extends Controllers {
    public function index() {
        $transactions = Transaction::with(['paymentMethod', 'user'])->get();
        return view('transactions.index', compact('transactions'));
    }

    public function createTransaction() {
        $peymentMethods = PaymentMethod::all();
        $products = Product::all();
        return view('transanctions.create', compact('paymentMethods', 'products'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'payment_methods_id' => 'required|exists:payment_method,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $transaction = Transaction::create($validated);

        return redirect()->route('transactions.index')->with('success', 'Transactions created successfully.');
    }

    public function destroy(Transaction $transaction) {
        $transaction->deleted();

        return redirect()->route('transactions.index'->with('success', 'Transaction deleted successfully.'));
    }
}