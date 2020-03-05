@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-right">
            <a href="{{route('companies.index')}}" class="btn btn-danger">Back</a>
        </div>
        <form method="post" action="{{ route('companies.update', $company->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <div class="form-group mt-3">
                <label for="logo" class="col-md-3 text-left text-success font-weight-bold">{{ __('Select Company Logo') }}</label>
                <div class="col-md-5 text-right">
                        <input type="file" name="logo" />
                        <img src="{{URL::to('/')}}/storage/images/{{$company->logo}}" class="img-thumbnail" width="100"/>
                        <input type="hidden" name="hiddenLogo" value="{{ $company->logo }}">
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="name" class="col-md-3 text-left text-success font-weight-bold">{{ __('Enter Company Name') }}</label>
                <div class="col-md-5 text-right">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $company->name }}" autofocus>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="email" class="col-md-3 text-left text-success font-weight-bold">{{ __('Enter Company Email') }}</label>
                <div class="col-md-5 text-right">
                        <input id="email" type="text" class="form-control" name="email" value="{{ $company->email }}" autofocus>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="website" class="col-md-3 text-left text-success font-weight-bold">{{ __('Enter Company Website') }}</label>
                <div class="col-md-5 text-right">
                        <input id="website" type="text" class="form-control" name="website" value="{{ $company->website }}" autofocus>
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