@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <div class="d-flex justify-content-start">
            <a href="{{route('employees.index')}}" class="btn btn-danger">Back</a>
        </div>
        <table class="table table-bordered table-dark mt-2 col-md-5">
            <tr>
                <td class="text-left font-weight-bold text-success">Company name:</td>
                <td class="text-left font-weight-bold">
                    @foreach($companies as $key => $company)
                        @if($company->id == $data->company_id)
                            {{$company->name}}
                        @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <td class="text-left font-weight-bold text-success">Employee firstname:</td>
                <td class="text-left font-weight-bold">{{$data->firstname}}</td>
            </tr>
            <tr>
                <td class="text-left font-weight-bold text-success">Employee lastname:</td>
                <td class="text-left font-weight-bold">{{$data->lastname}}</td>
            </tr>
            <tr>
                <td class="text-left font-weight-bold text-success">Employee Email:</td>
                <td class="text-left font-weight-bold">{{$data->email}}</td>
            </tr>
            <tr>
                <td class="text-left font-weight-bold text-success">Employee Phone number:</td>
                <td class="text-left font-weight-bold">{{$data->phone}}</td>
            </tr>           
    </div>

@endsection('content')