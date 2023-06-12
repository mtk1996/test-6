@extends('admin.layout.master')


@section('content')
<div>
    <a href="{{ route('admin.product.create') }}" class="btn btn-dark">Create Product</a>
</div>
<hr>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>order count</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $s)
        <tr>
            <td>
                <img src="{{ asset('/images/'.$s->image) }}" style="width:50px;height:50px;"
                    class="rounded-circle border border-dark p-1">
            </td>
            <td>{{ $s->name }}</td>
            <td>
                @foreach($s->category as $d)
                <span class="badge bg-dark text-white">{{ $d->name }}</span>
                @endforeach
            </td>
            <td>
                {{ $s->order_count }}
            </td>
            <td>
                <a href="{{ route('admin.product.edit',$s->id) }}" class="btn btn-primary">Edit</a>
                <form onsubmit="return confirm('မင်းဖြတ်သေချာလားဟျောင့်')"
                    action="{{ route('admin.product.destroy',$s->id) }}" method="POST" class="d-inline">
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