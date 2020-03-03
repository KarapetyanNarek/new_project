@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><span class="text-dark text-uppercase font-weight-bold">{{ __('Add Employees') }}</span>
                    <a href="{{ route('employees.index') }}" class="btn btn-danger ml-3">Back</a>
                </div>

                <div class="card-body">
                    @if($errors -> any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors -> all() as $error)
                                    <ul>{{ $error }}</ul>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('employees.store') }}">
                        @csrf
                        
                        <div class="form-group col-md-8 row">
                            <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('Select company') }}</label>

                            <div class="col-md-8">
                                
                                <select name="company_id" id="company_id">
                                    @foreach($companies as $key => $company)
                                        <option value="{{$company->id}}">
                                            {{$company->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-8 row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-8">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">
                            </div>
                        </div>
                        
                        <div class="form-group col-md-8 row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-8">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" autofocus>
                            </div>
                        </div>

                        <div class="form-group col-md-8 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
                            </div>
                        </div>

                        <div class="form-group col-md-8 row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone number') }}</label>

                            <div class="col-md-8">
                                <input type="text" id="phone" class="form-control" name="phone" value="{{ old('phone') }}" autofocus>
                            </div>
                        </div>
                        <div class="form-group col-md-8">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
