<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Invoice;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::where('user_id', auth()->user()->id)->get();
        $companyIds = $companies->pluck('id');

        $statusOrder = ['4', '2', '3', '1'];

        $invoices = Invoice::whereIn('company_id', $companyIds)
            ->whereIn('status', $statusOrder)
            ->with('project:id,title')
            ->with('company:id,name')
            ->select('id', 'amount', 'status', 'xml', 'pdf', 'project_id', 'company_id')
            ->orderByRaw("FIELD(status, '" . implode("','", $statusOrder) . "')")
            ->paginate(15)
        ;

        return view('invoices.index', compact('invoices'));
        // return $invoices;
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('invoices.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('invoices.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
