@extends('layouts.cl')
@section('content')
<section class="h-100 h-custom">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100" id="list-cart">
      <div class="col">

      <div class="table-responsive">
          <table class="table">
          @if(Session::has("Cart") != null)
            <thead>
              <tr>
                <th scope="col" class="h5">Shopping Bag</th>
                <th scope="col">Hãng</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Lưu</th>
                <th scope="col">Giá</th>
                <th scope="col">Xóa</th>
              </tr>
            </thead>
            <tbody>
                @foreach(Session::get('Cart')->products as $item)
              <tr>
                <th scope="row">
                  <div class="d-flex align-items-center">
                    <img src="{{Storage::url($item['productInfo']->img)}}" class="img-fluid rounded-3"
                      style="width: 120px;" alt="Book">
                    <div class="flex-column ms-4">
                      <p class="mb-2">{{$item['productInfo']->name}}</p>
                    </div>
                  </div>
                </th>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;">{{$item['productInfo']->comp->name}}</p>
                </td>
                <td class="align-middle">
                  <div class="d-flex flex-row">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                      <i class="fas fa-minus"></i>
                    </button>

                    <input id="quanty-item-{{$item['productInfo']->id}}" value="{{$item['quantity']}}" type="number"
                      class="form-control form-control-sm" style="width: 50px;" />

                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                </td>
                <td class="align-middle">
                <i class="fa-solid fa-floppy-disk me-3 d-flex" role="button" id="save-cart-item-{{$item['productInfo']->id}}" onclick="saveItemListCart({{$item['productInfo']->id}});"></i>
                </td>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;">${{$item['price']}}</p>
                </td>
                <td class="align-middle">
                <i class="fa-regular fa-rectangle-xmark me-3 d-flex" role="button" onclick="deleteItemListCart({{$item['productInfo']->id}});"></i>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @endif
        </div>

        <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
          <div class="card-body p-4">

            <div class="row">
              <div class="col-md-6 col-lg-4 col-xl-3 mb-4 mb-md-0">
              </div>
              <div class="col-md-6 col-lg-4 col-xl-6">
              </div>
              <div class="col-lg-4 col-xl-3">
              @if(Session::has("Cart") != null)
              <div class="d-flex justify-content-between" style="font-weight: 500;">
                  <p class="mb-0">Số lượng tổng</p>
                  <p class="mb-0">{{Session::get('Cart')->totalQuanty}}</p>
                </div>
                <div class="d-flex justify-content-between" style="font-weight: 500;">
                  <p class="mb-2">Giá dự kiến</p>
                  <p class="mb-2">${{Session::get('Cart')->totalPrice}}</p>
                </div>

                <div class="d-flex justify-content-between" style="font-weight: 500;">
                  <p class="mb-0">Shipping</p>
                  <p class="mb-0">Free Ship</p>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                  <p class="mb-2">Tổng giá</p>
                  <p class="mb-2">${{Session::get('Cart')->totalPrice}}</p>
                </div>

                <a href="{{route('client.checkout')}}"><button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block btn-lg">
                  <div class="d-flex justify-content-between">
                    <span>Thanh Toán</span>
                    <span>${{Session::get('Cart')->totalPrice}}</span>
                  </div>
                </button></a>

              </div>
              @endif
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>
@endsection
<script>
    function deleteItemListCart(id){
        $.ajax({
            url:'/client/deleteItemListCart/'+id,
            type:'GET',
        }).done(function(response) {
            RenderListCart(response);
            alertify.success('Đã xóa sản phẩm');
        });
    }
        function saveItemListCart(id){
        $.ajax({
            url:'/client/saveItemListCart/'+id+'/'+$("#quanty-item-"+id).val(),
            type:'GET',
        }).done(function(response) {
            RenderListCart(response);
            alertify.success('Đã cập nhật sản phẩm');
        });
    }

    function RenderListCart(response){
        $("#list-cart").empty();
        $("#list-cart").html(response);
    }
</script>