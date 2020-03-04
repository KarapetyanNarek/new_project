@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><span class="text-dark text-uppercase font-weight-bold">{{ __('Create Company') }}</span>
                    <a href="{{ route('companies.index') }}" class="btn btn-danger ml-3">Back</a>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group col-md-5 row">
                            <label for="logo" class="col-md-5 col-form-label text-md-right">{{ __('Logo') }}</label>

                            <div class="col-md-5">
                                <input type="file" class="btn btn-success" name="logo" >
                            </div>
                        </div>
                        
                        <div class="form-group col-md-8 row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>
                            </div>
                        </div>

                        <div class="form-group col-md-8 row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
                            </div>
                        </div>

                        <div class="form-group col-md-8 row">
                            <label for="website" class="col-md-3 col-form-label text-md-right">{{ __('Web-Site') }}</label>

                            <div class="col-md-9">
                                <input id="website" type="text" class="form-control" name="website" value="{{ old('website') }}" autofocus>
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
