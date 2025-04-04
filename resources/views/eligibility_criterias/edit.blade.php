@extends('layouts.app')

@section('content')
<h2>Edit Eligibility Criteria</h2>
<form action="{{route('eligibility_criterias.update', $eligibilityCriteria->id)}}" method="POST" novalidate="true">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $eligibilityCriteria->name) }}" required>
        @if ($errors->has('name'))
            <div class="alert alert-danger">
                {{ $errors->first('name') }}
            </div>
        @endif
    </div>
    <div class="mb-3">
        <label>Age less than</label>
        <input type="number" name="age_less_than" class="form-control" value="{{ old('age_less_than', $eligibilityCriteria->age_less_than) }}" required>
        @if ($errors->has('age_less_than'))
            <div class="alert alert-danger">
                {{ $errors->first('age_less_than') }}
            </div>
        @endif
    </div>
    <div class="mb-3">
        <label>Age greater than</label>
        <input type="number" name="age_greater_than" class="form-control" value="{{ old('age_greater_than', $eligibilityCriteria->age_greater_than) }}" required>
        @if ($errors->has('age_greater_than'))
            <div class="alert alert-danger">
                {{ $errors->first('age_greater_than') }}
            </div>
        @endif
    </div>
    <div class="mb-3">
        <label>Last login days ago</label>
        <input type="number" name="last_login_days_ago" class="form-control" value="{{ old('last_login_days_ago', $eligibilityCriteria->last_login_days_ago) }}" required>
        @if ($errors->has('last_login_days_ago'))
            <div class="alert alert-danger">
                {{ $errors->first('last_login_days_ago') }}
            </div>
        @endif
    </div>
    <div class="mb-3">
        <label>Income less than</label>
        <input type="number" name="income_less_than" class="form-control" value="{{ old('income_less_than', $eligibilityCriteria->income_less_than) }}" required>
        @if ($errors->has('income_less_than'))
            <div class="alert alert-danger">
                {{ $errors->first('income_less_than') }}
            </div>
        @endif
    </div>
    <div class="mb-3">
        <label>Income greater than</label>
        <input type="number" name="income_greater_than" class="form-control" value="{{ old('income_greater_than', $eligibilityCriteria->income_greater_than) }}" required>
        @if ($errors->has('income_greater_than'))
            <div class="alert alert-danger">
                {{ $errors->first('income_greater_than') }}
            </div>
        @endif
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('eligibility_criterias.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection