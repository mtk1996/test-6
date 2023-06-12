@extends('layout.master')

@section('content')
<div class="w-80 mt-5">

    <div class="row">

        <div class="col-12 col-sm-12 col-md-3 col-lg-3 ">
            <div class="card">
                <div class="card-header bg-dark text-white">All Category</div>
                <li class="list-group-item">
                    <img src="assets/images/category.jpeg" width="30" alt="">
                    Speaker
                    <small class="float-right badge badge-dark">10</small>
                </li>
                <li class="list-group-item">
                    <img src="assets/images/category.jpeg" width="30" alt="">
                    Speaker
                    <small class="float-right badge badge-dark">10</small>
                </li>
                <li class="list-group-item">
                    <img src="assets/images/category.jpeg" width="30" alt="">
                    Speaker
                    <small class="float-right badge badge-dark">10</small>
                </li>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-9 col-lg-9" id="root">

        </div>
    </div>

</div>
@endsection


@section('js')
<script>
    const blade_product_data = @json($product);
</script>
<script src="{{ asset('/js/ProductDetail.js') }}"></script>
@endsection