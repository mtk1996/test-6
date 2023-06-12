@extends('admin.layout.master')


@section('content')
<h1>All Order</h1>

<table class="table table-striped table-responsive">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Customer Info</th>
            <th>Payment</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order as $s)
        <tr>
            <td>
                <img src="{{ asset('/images/'.$s->product->image) }}" style="width:50px;height:50px;"
                    class="rounded-circle border border-dark p-1">
            </td>
            <td>{{ $s->product->name }}</td>
            <td>
                {{ $s->qty }}
            </td>
            <td>
                {{ $s->product->sell_price }}
            </td>
            <td>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $s->name }}</td>
                            <td>{{ $s->phone }}</td>
                            <td>{{ $s->address }}</td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td>





                <!-- Button trigger modal -->
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#id{{ $s->id }}">
                    Launch demo modal
                </button> --}}
                <img src="{{ asset('/images/'.$s->payment_screenshot) }}" width="130" data-toggle="modal"
                    data-target="#id{{ $s->id }}">

                <!-- Modal -->
                <div class="modal fade" id="id{{ $s->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <img src="{{ asset('/images/'.$s->payment_screenshot) }}" class="w-100">
                        </div>
                    </div>
                </div>





            </td>
            <td>
                <form action="{{ url('/admin/change-order-status') }}" class="d-inline">
                    <input type="hidden" name="id" value="{{ $s->id }}" id="">
                    <select name="status" class="btn btn-secondary" id="">
                        <option value="pending" {{ $s->status=='pending' ? 'selected' : '' }} >Pending</option>
                        <option value="success" {{ $s->status=='success' ? 'selected' : '' }}>Success</option>
                        <option value="cancel" {{ $s->status=='cancel' ? 'selected' : '' }}>Cancel</option>
                    </select>
                    <input type="submit" class="btn btn-dark" value="Change">
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection