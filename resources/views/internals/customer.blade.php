@extends('layout')

@section('title')
    Customer Page
@endsection

@section('content')
    <br>
    <h3>Customers</h3>
    <form action="customer" method="post">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
            <div class="alert-danger" role="alert">{{$errors->first('name')}}</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{old('email')}}">
            <div class="alert-danger">{{$errors->first('email')}}</div>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="active" id="active" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Select customer status</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
            <div class="alert-danger">{{$errors->first('active')}}</div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="company_id">Company</label>
            <select class="from-control form-select form-select-sm" id="company_id" name="company_id" aria-label=".form-select-sm example">
                <option selected>Select</option>
                <@foreach($companies as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                @endforeach
            </select>
            <div class="alert-danger">{{$errors->first('company_id')}}</div>
        </div>
        <button type="submit" class="btn btn-primary">Add Customer</button>
        @csrf
    </form>
    <hr>
    <div class="row">
        <div class="col-6">
            <h4>Active Customers</h4>
            <ul>
                @foreach($activeCustomers as $activeCustomers)
                    <li>{{$activeCustomers->name}} <span class="text-muted">({{$activeCustomers->email}})</span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-6">
            <h4>Inactive Customers</h4>
            <ul>
                @foreach($inActiveCustomers as $inActiveCustomer)
                    <li>{{$inActiveCustomer->name}} <span class="text-muted">({{$inActiveCustomer->email}})</span></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-6">
        @foreach($companies as $company)
            <h4>{{$company->name}}</h4>
            <ul>
                @foreach($company->customers as $item)
                    <li>{{$item->name}}</li>
                @endforeach
            </ul>
        @endforeach
    </div>
@endsection
