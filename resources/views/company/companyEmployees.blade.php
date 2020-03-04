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
                <th class="text-center">Employe firstname</th>
                <th class="text-center">Employe lastname</th>
                <th class="text-center">Employe email</th>
                <th class="text-center">Employe phone number</th>
            </tr>
            @foreach($employees as $key => $employe)
                @if($company->id == $employe->company_id)
                <tr>
                    <td class="text-center">{{$employe->firstname}}</td>
                    <td class="text-center">{{$employe->lastname}}</td>
                    <td class="text-center">{{$employe->email}}</td>
                    <td class="text-center">{{$employe->phone}}</td>
                </tr>
                @endif
            @endforeach
        </table>
    </div>
   
@endsection