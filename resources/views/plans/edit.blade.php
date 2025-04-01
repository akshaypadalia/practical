@extends('layouts.app')

@section('content')
<h2>Edit Plan</h2>
<form action="{{route('plans.update', $plan->id)}}" method="POST" novalidate="true">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{$plan->name}}" required>
        @if ($errors->has('name'))
            <div class="alert alert-danger">
                {{ $errors->first('name') }}
            </div>
        @endif
    </div>
    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" class="form-control" value="{{$plan->price}}" required>
        @if ($errors->has('price'))
            <div class="alert alert-danger">
                {{ $errors->first('price') }}
            </div>
        @endif
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('plans.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection