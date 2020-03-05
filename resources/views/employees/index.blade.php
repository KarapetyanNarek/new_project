@extends('layouts.app')

@section('content')
    <div class="row ml-5">
        <div class="col-md-12">
            <div class="col-md-8">
                <a href="{{ route('employees.create') }}" class="btn btn-lg btn-success">Add new Employees</a>
                <a href="{{ route('home') }}" class="btn btn-danger btn-lg btn-success">Back</a>
            </div>

            <table class="table table-bordered table-dark mt-2 col-md-8">
                <tr>
                    <th class="text-center">Company name</th>
                    <th class="text-center">Employee firstname</th>
                    <th class="text-center">Employee lastname</th>
                    <th class="text-center">Employee email</th>
                    <th class="text-center">Employee phone number</th>
                </tr>
                @foreach($employees as $key => $employee)
                    <tr>
                    <td class="text-center text-success">
                        @foreach($companies as $key => $company)
                                @if($company->id == $employee->company_id)
                                    {{$company->name}}
                                @endif
                        @endforeach

                    </td>
                    <td class="text-center">{{ $employee->firstname }}</td>
                    <td class="text-center">{{ $employee->lastname }}</td>
                    <td class="text-center">{{ $employee->email }}</td>
                    <td class="text-center">{{ $employee->phone }}</td>
                    <td class="text-center">
                        <form action="{{ route('employees.destroy', $employee->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want delete this employee?')" class="btn btn-danger">Delete</button>
                            <a href="{{route('employees.show', $employee->id)}}" class="btn btn-warning">Show</a>
                            <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-info">Edit</a>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </table>
            {!! $employees->links() !!}
        </div>
    </div>    
@endsection('content')