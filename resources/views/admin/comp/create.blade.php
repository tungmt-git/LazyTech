@extends('layouts.master')
@section('title')
    Tạo mới hãng sản phẩm
@endsection

@section('content')
    <form action="{{route('comp.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <label for="" class="form-label">Tên</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="row">
            <label for="" class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="img">
        </div><br>
        <button type="submit" class="btn btn-success">Tạo mới</button>
    </form>
@endsection