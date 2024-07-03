<?php

namespace App\Http\Controllers\entity_management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function showTransaction(Request $request) {
        return view('entity_management.history_transaction');
    }
}
