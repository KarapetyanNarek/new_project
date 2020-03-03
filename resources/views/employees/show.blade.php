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
                <td class="text-left font-weight-bold text-success">Employe firstname:</td>
                <td class="text-left font-weight-bold">{{$data->firstname}}</td>
            </tr>
            <tr>
                <td class="text-left font-weight-bold text-success">Employe lastname:</td>
                <td class="text-left font-weight-bold">{{$data->lastname}}</td>
            </tr>
            <tr>
                <td class="text-left font-weight-bold text-success">Employe Email:</td>
                <td class="text-left font-weight-bold">{{$data->email}}</td>
            </tr>
            <tr>
                <td class="text-left font-weight-bold text-success">Employe Phone number:</td>
                <td class="text-left font-weight-bold">{{$data->phone}}</td>
            </tr>
                
                {{-- <th class="text-center">Employe lastname:</th>
                <th class="text-center">Employe email:</th>
                <th class="text-center">Employe phone number:</th>
            </tr>
        </table>
        <div class="d-flex justify-content-end">
            <a href="{{route('employees.index')}}" class="btn btn-danger">Back</a>
        </div>
        <div class="text-left">
            <div class="d-flex">
                <h3 class="text-success font-weight-bold mr-2">Company name:</h3>
                <h3 class="text-dark font-weight-bold text-rigth">
                    @foreach($companies as $key => $company)
                        @if($company->id == $data->company_id)
                            {{$company->name}}
                        @endif
                    @endforeach
                </h3>
            </div>
            <div class="d-flex">
                <h3 class="text-success font-weight-bold mr-5">Firstname:</h3>
                <h3 class="text-dark font-weight-bold">{{$data->firstname}}</h3>
            </div>
            <div class="d-flex">
                <h3 class="text-success font-weight-bold">Lastname:</h3>
                <h3 class="text-dark font-weight-bold ml-5">{{$data->lastname}}</h3>
            </div> 
            <div class="d-flex">
                <h3 class="text-success font-weight-bold">Email:</h3>
                <h3 class="text-dark font-weight-bold ml-5">{{$data->email}}</h3>
            </div> 
            <div class="d-flex">
                <h3 class="text-success font-weight-bold">Phone number:</h3>
                <h3 class="text-dark font-weight-bold ml-5">{{$data->phone}}</h3>
            </div>
        </div> --}}
    </div>

@endsection('content')