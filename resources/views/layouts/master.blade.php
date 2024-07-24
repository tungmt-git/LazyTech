<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <header class="bg-warning">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('comp.index')}}">Trang Chủ</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{route('comp.index')}}">Hãng điện thoại</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('phone.index')}}">Sản phẩm</a>
      </li>
    </ul>
  </div>
</nav>
        </header>
        <main>
          <a href="{{route('client.index')}}"><button class="btn btn-warning">Chuyển sang Client</button></a>
            <h2>@yield('title')</h2>
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
    </div>

</body>
</html>