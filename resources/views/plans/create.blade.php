@extends('layouts.app')

@section('content')
<h2>Add Plan</h2>
<form action="{{route('plans.store')}}" method="POST" novalidate="true">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        @if ($errors->has('name'))
            <div class="alert alert-danger">
                {{ $errors->first('name') }}
            </div>
        @endif
    </div>
    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
        @if ($errors->has('price'))
            <div class="alert alert-danger">
                {{ $errors->first('price') }}
            </div>
        @endif
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('plans.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection