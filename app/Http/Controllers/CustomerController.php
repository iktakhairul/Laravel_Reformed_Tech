<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list(){

        $activeCustomers = Customer::active()->get();
        $inActiveCustomers = Customer::inactive()->get();

        return view('internals.customer', [
            'activeCustomers' => $activeCustomers,
            'inActiveCustomers' => $inActiveCustomers,
        ]);
    }

    public function store(){

        $data = \request()->validate([

            'name' => 'required|min:3',
            'email' => 'required|email:rfc,dns',
            'active' => 'required',
        ]);

        Customer::create($data);
        return back();
    }
}
