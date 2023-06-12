@extends('admin.layout.master')


@section('content')
<div>
    <a href="{{ route('admin.income.create') }}" class="btn btn-dark">Create Income</a>
</div>
<hr>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Amount</th>
            <th>Date</th>
            <th>Description</th>

            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $s)
        <tr>

            <td>{{ $s->amount }}</td>
            <td>{{ $s->create_date }}</td>
            <td>{{ $s->description }}</td>

            <td>
                <a href="{{ route('admin.income.edit',$s->id) }}" class="btn btn-primary">Edit</a>
                <form onsubmit="return confirm('မင်းဖြတ်သေချာလားဟျောင့်')"
                    action="{{ route('admin.income.destroy',$s->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection