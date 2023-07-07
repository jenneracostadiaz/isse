<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index(){

        $typesStatus = [
            '1' => 'PENDING',
            '2' => 'REVIEWING',
            '3' => 'APPROVED',
            '4' => 'IN_PROGRESS',
            '5' => 'COMPLETED',
        ];

        $user_id = auth()->user()->id;

        $companies = Company::where('user_id', auth()->user()->id)
            ->get();

        $quotes = [];
        foreach ($companies as $key => $company) {
            if($company->quotes){
                foreach ($company->quotes as $key => $quote) {
                    $quotes[] = Quote::where('company_id', $company->id)
                        ->where('id', $quote->id)
                        ->first();
                }
            }
        }

        // return view('quotes.index');
        return $quotes;
    }
}
