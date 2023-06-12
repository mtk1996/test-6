@extends('admin.layout.master')

@section('content')
<div>
    <a href="{{ route('admin.income.index') }}" class="btn btn-dark">All Income</a>
</div>

<form method="POST" action="{{ route('admin.income.update',$data->id) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="">Enter Amount</label>
        <input type="integer" class="form-control" name="amount" value="{{ $data->amount }}">
    </div>
    <div class="form-group">
        <label for="">Enter Date</label>
        <input type="date" value="{{ $data->create_date }}" class="form-control" name="date">
    </div>
    <div class="form-group">
        <label for="">Enter Description</label>
        <textarea name="description" class="form-control">{{ $data->description }}</textarea>
    </div>
    <input type="submit" value="Update" class="btn btn-dark">
</form>
@endsection