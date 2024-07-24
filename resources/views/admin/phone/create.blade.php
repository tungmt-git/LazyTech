@extends('layouts.master')
@section('title')
    Tạo mới Điện thoại
@endsection

@section('content')
    <form action="{{route('phone.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-3 mb-4">
            <label for="" class="form-label">Tên</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mt-3 mb-4">
            <label for="" class="form-label">Giá</label>
            <input type="text" class="form-control" name="cost">
        </div>
        <div class="mt-3 mb-4">
            <label for="" class="form-label">Hãng sản xuất</label>
            <select name="comp_id" id="" class="form-select">
                @foreach($comps as $id => $name)
                    <option value="{{$id}}">{{$name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3 mb-4">
            <label for="" class="form-label">Số lượng</label>
            <input type="text" class="form-control" name="quantity">
        </div>
        <div class="mt-3 mb-4">
            <label for="" class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="img">
        </div>
        <div class="mt-3 mb-4">
            <label for="" class="form-check-label">Mô tả</label><br>
            <textarea name="mota" id="" cols="100" row="10"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Tạo mới</button>

    </form>
@endsection