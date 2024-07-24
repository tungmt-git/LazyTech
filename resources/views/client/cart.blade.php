@if(Session::has("Cart") != null)
    @foreach(Session::get('Cart')->products as $item)
<div class="d-flex mb-3">
        <a href="{{route('client.detail',$item['productInfo']->id)}}" class="me-3">
            <img src="{{Storage::url($item['productInfo']->img)}}" style="max-width: 50px; height: 50px;" class="img-md img-thumbnail" />
        </a>
        <div class="info">
        <a href="{{route('client.detail',$item['productInfo']->id)}}" class="nav-link mb-1">
            <p class="text-lowercase">{{$item['productInfo']->name}}</p>
            </a><br>
            <strong class="text-dark">${{$item['productInfo']->cost}}</strong> * <span class="text-dark">{{$item['quantity']}}</span>
        </div>
        <div class="del">
              <i class="fa-regular fa-rectangle-xmark me-3 d-flex" data-id="{{$item['productInfo']->id}}" role="button"></i>
          </div>
        </div>
        @endforeach
            <div>
                <b>Total Price:</b> <b>{{Session::get('Cart')->totalPrice}}$</b>
                <input hidden id="total-quanty-cart" type="number" name="" value="{{Session::get('Cart')->totalQuanty}}">
            </div>
@endif