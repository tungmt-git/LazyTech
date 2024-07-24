@extends('layouts.cl')
@section('content')
<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
        @if(Session::has("Cart") != null)
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="{{route('client.index')}}" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Tiếp tục mua hàng ?</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Giỏ hàng</p>
                    <p class="mb-0">Bạn có {{Session::get('Cart')->totalQuanty}} sản phẩm trong giỏ hàng</p>
                  </div>
                </div>
                @foreach(Session::get("Cart")->products as $item)
                <div class="card mb-3 mb-lg-0">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img
                            src="{{Storage::url($item['productInfo']->img)}}"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div>
                        <div class="ms-3">
                          <h5>{{$item['productInfo']->name}}</h5>
                          <p class="small mb-0">{{$item['productInfo']->comp->name}}</p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px;">
                          <h5 class="fw-normal mb-0">{{$item['quantity']}}</h5>
                        </div>
                        <div style="width: 80px;">
                          <h5 class="mb-0">${{$item['price']}}</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              <div class="col-lg-5">

                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Thông tin người đặt / nhận hàng</h5>
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                        class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                    </div>

                    <p class="small mb-2">Thanh toán bằng :</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Online (Visa/ Master Card / Momo)
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Offline (COD)
                        </label>
                        </div>

                    <form class="mt-4">
                      <div data-mdb-input-init class="form-outline form-white mb-4">
                        <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                          placeholder="Nhập tên người nhận..." />
                        <label class="form-label" for="typeName">Tên người nhận hàng</label>
                      </div>

                      <div data-mdb-input-init class="form-outline form-white mb-4">
                        <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                          placeholder="Hãy nhập số điện thoại" minlength="19" maxlength="19" />
                        <label class="form-label" for="typeText">Số điện thoại</label>
                      </div>

                      <div class="row mb-4">
                        <div class="col-md-4">
                          <div data-mdb-input-init class="form-outline form-white">
                            <input type="text" id="typeExp" class="form-control form-control-lg"
                              placeholder="Ví dụ: 12 Nguyễn Văn A" size="7" id="exp" minlength="7" maxlength="7" />
                            <label class="form-label" for="typeExp">Địa chỉ nhà</label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div data-mdb-input-init class="form-outline form-white">
                            <input type="text" id="typeExp" class="form-control form-control-lg"
                              placeholder="Ví dụ: Q.Thanh Xuân" size="7" id="exp" minlength="7" maxlength="7" />
                            <label class="form-label" for="typeExp">Quận/Huyện</label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div data-mdb-input-init class="form-outline form-white">
                            <input type="text" id="typeExp" class="form-control form-control-lg"
                              placeholder="Ví dụ: TP.Hà Nội" size="7" id="exp" minlength="7" maxlength="7" />
                            <label class="form-label" for="typeExp">Thành Phố/ Tỉnh</label>
                          </div>
                        </div>
                      </div>

                    </form>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Giá dự kiến</p>
                      <p class="mb-2">${{Session::get('Cart')->totalPrice}}</p>
                    </div>

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Shipping</p>
                      <p class="mb-2">Miễn phí</p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Tổng tiền thanh toán</p>
                      <p class="mb-2">${{Session::get('Cart')->totalPrice}}</p>
                    </div>

                    <a href="{{route('client.thanhcong')}}"><button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-block btn-lg">
                      <div class="d-flex justify-content-center">
                        <span>Đặt hàng <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                      </div>
                    </button></a>

                  </div>
                </div>

              </div>

            </div>
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection