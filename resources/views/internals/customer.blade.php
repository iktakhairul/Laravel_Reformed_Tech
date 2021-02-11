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
            <div>{{$errors->first('name')}}</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{old('email')}}">
            <div>{{$errors->first('email')}}</div>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="active" id="active">
                <option value="" disabled>Select customer status</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
            <div>{{$errors->first('name')}}</div>
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
                @foreach($inActiveCustomers as $inActiveCustomers)
                    <li>{{$inActiveCustomers->name}} <span class="text-muted">({{$inActiveCustomers->email}})</span></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
