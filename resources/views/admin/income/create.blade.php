@extends('admin.layout.master')

@section('content')
<div>
    <a href="{{ route('admin.income.index') }}" class="btn btn-dark">All Income</a>
</div>

<form method="POST" action="{{ route('admin.income.store') }}">
    @csrf
    <div class="form-group">
        <label for="">Enter Amount</label>
        <input type="integer" class="form-control" name="amount">
    </div>
    <div class="form-group">
        <label for="">Enter Date</label>
        <input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="date">
    </div>
    <div class="form-group">
        <label for="">Enter Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <input type="submit" value="Create" class="btn btn-dark">
</form>
@endsection