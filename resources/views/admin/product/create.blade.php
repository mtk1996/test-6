@extends('admin.layout.master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div>
    <a href="{{ route('admin.product.index') }}" class="btn btn-dark">All Product</a>
</div>
<hr>
<form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Stock Qty</label>
                <input type="number" name="stock_qty" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Sell Price</label>
                <input type="number" name="sell_price" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Discounted Price</label>
                <input type="number" name="discounted_price" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea id="description" name="description"></textarea>
            </div>
        </div>
        <div class="col-4">
            <div class="card p-3">
                <div class="form-group">
                    <label for="">Choose Brand</label>
                    <select name="brand_id" id="" class="form-control">
                        @foreach ($brand as $d )
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Choose Category</label>
                    <select multiple id="category" name="category_id[]" id="" class="form-control">
                        @foreach ($category as $d )
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Choose Color</label>
                    <select multiple id="color" name="color_id[]" id="" class="form-control">
                        @foreach ($color as $d )
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="Create" class="btn btn-primary">
            </div>

        </div>

    </div>

</form>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('#category').select2();
    $('#color').select2();
    $('#description').summernote();
</script>
@endsection