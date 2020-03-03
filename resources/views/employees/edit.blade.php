@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-right">
        <a href="{{route('employees.index')}}" class="btn btn-danger">Back</a>
    </div>
    <form method="post" action="{{ route('employees.update', $employe->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        
        <div class="form-group mt-3">
            <label for="logo" class="col-md-3 text-left text-success font-weight-bold">{{ __('Select Company name') }}</label>
            <div class="col-md-5 text-left">
                <select name="company_id" id="company_id">
                    @foreach($companies as $key => $company)
                        <option value="{{$company->id}}">
                            {{$company->name}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group mt-3">
            <label for="firstname" class="col-md-3 text-left text-success font-weight-bold">{{ __('Enter firstname') }}</label>
            <div class="col-md-5 text-right">
                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $employe->firstname }}" autofocus>
            </div>
        </div>
        <div class="form-group mt-3">
            <label for="lastname" class="col-md-3 text-left text-success font-weight-bold">{{ __('Enter lastname') }}</label>
            <div class="col-md-5 text-right">
                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $employe->lastname }}" autofocus>
            </div>
        </div>
        <div class="form-group mt-3">
            <label for="email" class="col-md-3 text-left text-success font-weight-bold">{{ __('Enter email') }}</label>
            <div class="col-md-5 text-right">
                    <input id="email" type="text" class="form-control" name="email" value="{{ $employe->email }}" autofocus>
            </div>
        </div>
        <div class="form-group mt-3">
            <label for="phone" class="col-md-3 text-left text-success font-weight-bold">{{ __('Enter phone number') }}</label>
            <div class="col-md-5 text-right">
                    <input id="phone" type="text" class="form-control" name="phone" value="{{ $employe->phone }}" autofocus>
            </div>
        </div>
        <div class="form-group mt-3">
            <div class="col-md-5 text-left" width="100">
                <input type="submit" class="form-control btn btn-primary mt-2" width="100" name="edit" value="Edit">
            </div>
        </div>
    </form>
</div>
@endsection