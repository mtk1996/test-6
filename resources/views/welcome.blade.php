@extends('layout.master')

@section('content')
<!-- category list -->
<div class="w-80 mt-5">
    <div class="row mt-2">

        <!-- loop category -->
        @foreach ($category as $c)
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 border">
            <a href="" class="text-dark">
                <div class="d-flex justify-content-around align-items-center p-3">
                    <a href="{{ url('/product?category='.$c->slug) }}" class="text-dark">
                        <img src="{{ asset('/images/'.$c->image) }}" width="100" alt="">
                        <div class="text-center">
                            <p class="fs-2">
                                {{ session('lang') == 'en' ? $c->name : $c->mm_name }}
                            </p>
                            <small class="">{{ $c->product_count }} items</small>
                        </div>
                    </a>

                </div>
            </a>
        </div>
        @endforeach

    </div>
</div>

<div class="w-80 mt-5">

    <div class="row">

        <div class="col-12 col-sm-12 col-md-3 col-lg-3 ">
            <a href="">
                <div class="border bg-warning p-5 text-center rounded">
                    <img src="/assets/images/product1.jpeg" class="w-80 margin-auto  rounded" alt="">
                    <div class="mt-5">
                        <h4 class="text-center mt-4 text-white">စားအုန်းဆီ အစစ်</h4>
                        <span class="text badge badge-white">10000ks</span>
                        <span class="text badge badge-danger"><strike>12000ks</strike></span>
                    </div>
                </div>
            </a>


            <div class="border bg-primary p-5 text-center rounded">
                <img src="/assets/images/product2.jpeg" class="w-80 margin-auto  rounded" alt="">
                <div class="mt-5">
                    <h4 class="text-center mt-4 text-white">Speaker</h4>
                    <span class="text badge badge-white">10000ks</span>
                    <span class="text badge badge-danger"><strike>12000ks</strike></span>
                </div>
            </div>

        </div>

        <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <div class="row">
                <!-- products -->
                @foreach ($productByCategory as $p)
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-3 product">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <b class="fs-1">{{ $p->name }}</b>
                                <a href="{{ url('/product?category='.$p->slug) }}" class="btn btn-warning">
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- loop product -->
                        @foreach ($p->product as $sP)
                        <div class="col-12 col-md-4 text-center mt-2">
                            <a href="{{ url('/product/'.$sP->slug) }}">
                                <div class="card p-2">
                                    <img src="{{ asset('/images/'.$sP->image) }}" alt="" class="w-100">
                                    <b>{{ $sP->name }}</b>
                                    <div>
                                        <small class=" badge badge-danger"> <strike>{{ $sP->discounted_price
                                                }}ks</strike> </small>
                                        <small class="badge bg-primary">{{ $sP->sell_price }}ks</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach


                    </div>


                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection