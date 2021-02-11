<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class CustomerController extends Controller
{
    public function list(){

        $activeCustomers = Customer::active()->get();
        $inActiveCustomers = Customer::inactive()->get();
        $customers = Customer::all();
        $company = Company::all();
        $companies = Company::with('customers')->get();

        return view('internals.customer', [
            'activeCustomers' => $activeCustomers,
            'inActiveCustomers' => $inActiveCustomers,
            'company' => $company,
            'customers' => $customers,
            'companies' => $companies,
        ]);
    }

    public function store(){

        $data = \request()->validate([

            'name' => 'required|min:3',
            'email' => 'required|email:rfc,dns',
            'active' => 'required|integer',
            'company_id' => 'required|integer',
        ]);

        Customer::create($data);
        return back();
    }
}
