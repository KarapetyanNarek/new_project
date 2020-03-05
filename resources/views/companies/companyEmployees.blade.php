@extends('layouts.app')

@section('content')
    
    <div class="jumbotron">
        <div class="d-flex justify-content-start">
            <a href="{{route('companies.index')}}" class="btn btn-danger">Back</a>
        </div>
        <div class="mt-3">
            <h3>{{$company->name}} employees</h3>
        </div>
        <table class="table table-bordered table-dark mt-2 col-md-5">
            <tr>
                <th class="text-center">Employee firstname</th>
                <th class="text-center">Employee lastname</th>
                <th class="text-center">Employee email</th>
                <th class="text-center">Employee phone number</th>
            </tr>
            @foreach($company->employee as $key => $employee)
                @if($company->id == $employee->company_id)
                <tr>
                    <td class="text-center">{{$employee->firstname}}</td>
                    <td class="text-center">{{$employee->lastname}}</td>
                    <td class="text-center">{{$employee->email}}</td>
                    <td class="text-center">{{$employee->phone}}</td>
                </tr>
                @endif
            @endforeach
        </table>
    </div>
   
@endsection