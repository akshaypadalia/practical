@extends('layouts.app')

@section('content')
<h2>Edit Combo Plan</h2>
<form action="{{route('combo_plans.update', $comboPlan->id)}}" method="POST" novalidate="true">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{$comboPlan->name}}" required>
        @if ($errors->has('name'))
            <div class="alert alert-danger">
                {{ $errors->first('name') }}
            </div>
        @endif
    </div>
    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" class="form-control" value="{{$comboPlan->price}}" required>
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
                <option {{ in_array($id, $comboPlan->plan_ids) ? 'selected="selected"' : '' }} value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @if ($errors->has('selected_plan'))
            <div class="alert alert-danger">
                {{ $errors->first('selected_plan') }}
            </div>
        @endif
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('combo_plans.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection