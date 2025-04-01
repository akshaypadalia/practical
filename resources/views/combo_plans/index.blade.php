@extends('layouts.app')

@section('content')
    <h2>Combo Plans</h2>
    <a href="{{route('combo_plans.create')}}" class="btn btn-primary">Add Combo Plan</a>
    @if(session('success'))
        <div class="alert alert-success mt-2">{{session('success')}}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Plan Included</th>
                <th>Actions</th>
            </tr>
        </thead>
            <tbody>
                @foreach($comboPlans as $comboPlan)
                    <tr>
                        <td>
                            {{$comboPlan->name}}
                        </td>
                        <td>
                            {{$comboPlan->price}}
                        </td>
                        <td>
                            @foreach($comboPlan->getPlanNames() as $plan)
                                <span class="badge bg-primary">{{$plan}}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{route('combo_plans.edit', $comboPlan->id)}}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{route('combo_plans.destroy', $comboPlan->id)}}" method="POST" onClick="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table>
    {{ $comboPlans->links('pagination::bootstrap-5') }}
@endsection