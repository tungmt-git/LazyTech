<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LazyTech - Shop</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet"/>
        <link href="../assets/css/checkout.css" rel="stylesheet"/>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script>
        <!-- Core theme JS-->
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>
        <!-- Semantic UI theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/semantic.min.css"/>
        <!-- Bootstrap theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
        
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{route('client.index')}}">Lazy Tech</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('client.index')}}">Trang chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Giới Thiệu</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">Hãng sản phẩm</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($data as $item)
                                <li><a class="dropdown-item" href="{{route('client.list',$item)}}">{{$item->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="">Liên Hệ</a></li>
                    </ul>
                    <div class="d-flex">
                        <li class="nav-item dropdown collapse navbar-collapse">
                            <a class="nav-link dropdown-toggle btn btn-outline-dark" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true"><i class="bi-cart-fill me-1"></i>
                            Cart 
                            @if(Session::has("Cart") != null)
                            <span class="badge bg-dark text-white ms-1 rounded-pill" id="total-quanty-show">{{Session::get("Cart")->totalQuanty}}</span>
                            @else
                            <span class="badge bg-dark text-white ms-1 rounded-pill" id="total-quanty-show">0</span>
                            @endif
                        </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li> 
                                    <div id="change-item-cart">         
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
                                <strong class="text-dark">${{$item['productInfo']->cost}}</strong> * <strong class="text-dark">{{$item['quantity']}}</strong>
                            </div>
                            <div class="del">
                                <i class="fa-regular fa-rectangle-xmark me-3 d-flex" data-id="{{$item['productInfo']->id}}" role="button"></i>
                            </div>
                            </div>
                            @endforeach
                                <div>
                                    <b>Total Price:</b> <b>{{Session::get('Cart')->totalPrice}}$</b>
                                </div>
                    @endif
                                    </div>
                                </li>
                                <a href="{{route('client.view')}}" class="btn btn-warning " role="button">Kiểm tra Giỏ hàng</a>
                                <a href="{{route('client.checkout')}}" class="btn btn-success" role="button">Thanh toán</a>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Header-->
        @yield('title')
        <!-- Section-->
        <div class="container-fluid">
            @yield('content')
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- Core theme JS-->
         
        <script src="../assets/js/jquery-3.3.1.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery-ui.min.js"></script>
        <script src="../assets/js/jquery.countdown.min.js"></script>
        <script src="../assets/js/jquery.nice-select.min.js"></script>
        <script src="../assets/js/jquery.zoom.min.js"></script>
        <script src="../assets/js/jquery.dd.min.js"></script>
        <script src="../assets/js/jquery.slicknav.js"></script>
        <script src="../assets/js/owl.carousel.min.js"></script>
        <script src="../assets/js/main.js"></script>

        <script>
                $("#change-item-cart").on("click",".del i",function(){
                    $.ajax({
                        url:'client/deleteItemCart/'+$(this).data("id"),
                        type:'GET',
                    }).done(function(response) {
                        RenderCart(response);
                        alertify.success('Đã xóa sản phẩm');
                    });
                    });
                    function RenderCart(response){
                        $("#change-item-cart").empty();
                        $("#change-item-cart").html(response);
                        $("#total-quanty-show").text($("#total-quanty-cart").val());
                    }
                    
        </script>
    </body>
</html>
