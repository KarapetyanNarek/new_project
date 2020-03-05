@extends('layouts.app')

@section('content')
    <div class="row ml-5">
        <div class="col-md-12">
            <div class="col-md-8">
                <a href="{{ route('companies.create') }}" class="btn btn-lg btn-success">Add new Companies</a>
                <a href="{{ route('home') }}" class="btn btn-danger btn-lg btn-success">Back</a>
            </div>

            <table class="table table-bordered table-dark mt-2 col-md-8">
                <tr>
                    <th class="text-center">Company logo</th>
                    <th class="text-center">Company name</th>
                    <th class="text-center">Company email</th>
                    <th class="text-center">Company website</th>
                </tr>
                @foreach($companies as $key => $company)
                    <tr>
                    <td class="text-center"><img src="{{ URL::to('/') }}/storage/images/{{ $company->logo }}" class="img-thumbnail" width="100" height="100"></td>
                    <td class="text-center text-success">{{ $company->name }}</td>
                    <td class="text-center">{{ $company->email }}</td>
                    <td class="text-center">{{ $company->website }}</td>
                    <td class="text-center">
                        <form action="{{ route('companies.destroy', $company->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this company?');" class="btn btn-danger">Delete</button>
                            <a href="{{route('companies.show', $company->id)}}" class="btn btn-warning">Show</a>
                            <a href="{{route('companies.edit', $company->id)}}" class="btn btn-info">Edit</a>
                            <a href="{{url('companies/'. $company->id . '/employees')}}" class="btn btn-info">Company Employees</a>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </table>
            {!! $companies->links() !!}
        </div>
    </div>    
@endsection