@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <div class="d-flex justify-content-end">
            <a href="{{route('companies.index')}}" class="btn btn-danger">Back</a>
        </div>
        <div class="d-flex">
            <div>
                <img src="{{URL::to('/')}}/images/{{$data->logo}}" alt="Company logo" class="img-thumbnail" width="100"/>
            </div>
            <div class="ml-5">
                <h3><span class="text-success font-weight-bold">Company name:</span> {{strtoupper($data->name)}}</h3>
                <h3><span class="text-success font-weight-bold">Company email:</span> {{$data->email}}</h3>
                <h3><span class='text-success font-weight-bold'>Company website:</span> {{$data->website}}</h3>
            </div>

        </div>
    </div>

@endsection('content')