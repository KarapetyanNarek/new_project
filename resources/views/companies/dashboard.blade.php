@extends('layouts.app')

@section('content')
    <div class="row ml-5">
        <div class="col-md-12">
            <div class="col-md-5 pull-right">
            <a href="{{ route('companies.create') }}" class="btn btn-lg btn-success">Add new Companies</a>
            </div>

            <table class="table table-bordered table-dark mt-2 col-md-8">
                <tr>
                    <th class="text-center">Logo</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">WebSite</th>
                </tr>
                @foreach($companies as $key => $company)
                    <tr>
                    <td class="text-center"><img src="{{ URL::to('/') }}/images/{{ $company->logo }}" class="img-thumbnail" width="100" height="100"></td>
                    <td class="text-center">{{ $company->name }}</td>
                    <td class="text-center">{{ $company->email }}</td>
                    <td class="text-center">{{ $company->website }}</td>
                    <td class="text-center">
                        <form action="{{ route('companies.destroy', $company->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <a href="{{'companies.show', $company->id}}" class="btn btn-warning">Show</a>
                            <a href="{{'companies.edit', $company->id}}" class="btn btn-info">Edit</a>
                            <a href="#" class="btn btn-info">Company Employees</a>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </table>
            {!! $companies->links() !!}
        </div>
    </div>    
@endsection('content')