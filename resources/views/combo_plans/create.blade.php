@extends('layouts.app')

@section('content')
<h2>Add Combo Plan</h2>
<form action="{{route('combo_plans.store')}}" method="POST" novalidate="true">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" id="name" name="name" class="form-control" required>
        @if ($errors->has('name'))
            <div class="alert alert-danger">
                {{ $errors->first('name') }}
            </div>
        @endif
    </div>
    <div class="mb-3">
        <label>Price</label>
        <input type="number" id="price" name="price" class="form-control" required>
        @if ($errors->has('price'))
            <div class="alert alert-danger">
                {{ $errors->first('price') }}
            </div>
        @endif
    </div>
    <div class="mb-3">
        <label>Select Plans</label>
        <select name="selected_plan[]" class="form-control" multiple>
            @foreach($plans as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @if ($errors->has('selected_plan'))
            <div class="alert alert-danger">
                {{ $errors->first('selected_plan') }}
            </div>
        @endif
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('combo_plans.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection