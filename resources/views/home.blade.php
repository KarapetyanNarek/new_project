@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                <div class="mt-3 w-100">
                    <a href="companies" class="btn btn-lg btn-success w-100"><span class="text-uppercase font-weight-bold text-dark">Go to Companies</span></a>
                </div>
                <div class="mt-3 w-100">
                    <a href="employees" class="btn btn-lg btn-success w-100"><span class="text-uppercase font-weight-bold text-dark">Go to Employees</span></a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
