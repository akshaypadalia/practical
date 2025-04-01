@extends('layouts.app')

@section('content')
    <h2>Eligibility Criterias</h2>
    <a href="{{route('eligibility_criterias.create')}}" class="btn btn-primary">Add Eligibility Criteria</a>
    @if(session('success'))
        <div class="alert alert-success mt-2">{{session('success')}}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age less than</th>
                <th>Age greater than</th>
                <th>Last login days ago</th>
                <th>Income less than</th>
                <th>Income greater than</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eligibilityCriteria as $eligibility)
                <tr>
                    <td>
                        {{$eligibility->name}}
                    </td>
                    <td>
                        {{$eligibility->age_less_than}}
                    </td>
                    <td>
                        {{$eligibility->age_greater_than}}
                    </td>
                    <td>
                        {{$eligibility->last_login_days_ago}}
                    </td>
                    <td>
                        {{$eligibility->income_less_than}}
                    </td>
                    <td>
                        {{$eligibility->income_greater_than}}
                    </td>
                    <td>
                        <a href="{{route('eligibility_criterias.edit', $eligibility->id)}}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{route('eligibility_criterias.destroy', $eligibility->id)}}" method="POST" onSubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $eligibilityCriteria->links('pagination::bootstrap-5') }}
@endsection