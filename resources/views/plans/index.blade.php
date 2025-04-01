@extends('layouts.app')

@section('content')
    <h2>Plans</h2>
    <a href="{{route('plans.create')}}" class="btn btn-primary">Add Plan</a>
    @if(session('success'))
        <div class="alert alert-success mt-2">{{session('success')}}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($plans as $plan)
                <tr>
                    <td>
                        {{$plan->name}}
                    </td>
                    <td>
                        {{$plan->price}}
                    </td>
                    <td>
                        <a href="{{route('plans.edit', $plan->id)}}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{route('plans.destroy', $plan->id)}}" method="POST" onSubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $plans->links('pagination::bootstrap-5') }}
@endsection