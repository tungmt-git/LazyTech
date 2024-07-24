@extends('layouts.cl')
@section('title')
<header class="bg-black py-5">
            <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Sản phẩm hãng {{$comp->name}}</h1>
                </div>
            </div>
        </header>
@endsection
@section('content')
<section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach($data as $item)
                    <div class="col mb-5">
                        <div class="card h-100 hover-zoom">
                            <!-- Product image-->
                            <img class="card-img-top hover-zoom" src="{{Storage::url($item->img)}}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$item->name}}</h5>
                                    <div class="d-flex justify-content-center small mb-2">
                                        <a href="{{route('client.detail',$item)}}"><p>{{$item->comp->name}}</p></a>
                                    </div>
                                    <!-- Product price-->
                                    <p class="text-danger">${{$item->cost}}</p>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('client.detail',$item)}}">Xem sản phẩm</a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
@endsection