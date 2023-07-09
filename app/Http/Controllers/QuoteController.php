<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Quote;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;


class QuoteController extends Controller
{
    public function index(){

        $companies = Company::where('user_id', auth()->user()->id)->get();
        $companyIds = $companies->pluck('id');

        $statusOrder = ['4', '3', '1', '2', '5'];

        $quotes = Quote::whereIn('company_id', $companyIds)
            ->whereIn('status', $statusOrder)
            ->with('project:id,title')
            ->with('company:id,name')
            // ->select('id', 'amount', 'status', 'xml', 'pdf', 'project_id', 'company_id')
            ->orderByRaw("FIELD(status, '" . implode("','", $statusOrder) . "')")
            ->paginate(15)
        ;

        return view('quotes.index', compact('quotes'));
        // return $quotes;
    }
}
