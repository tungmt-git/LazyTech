@extends('layouts.master')
@section('title')
    Sửa Sản phẩm {{$phone->name}}
@endsection

@section('content')
    <form action="{{route('phone.update',$phone)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mt-3 mb-4">
            <label for="" class="form-label">Tên</label>
            <input type="text" class="form-control" name="name" value="{{$phone->name}}">
        </div>
        <div class="mt-3 mb-4">
            <label for="" class="form-label">Giá</label>
            <input type="text" class="form-control" name="cost" value="{{$phone->cost}}">
        </div>
        <div class="mt-3 mb-4">
            <label for="" class="form-label">Hãng sản xuất</label>
            <select name="comp_id" id="" class="form-select">
                @foreach($comps as $id => $name)
                    <option value="{{$id}}" @selected($phone->comp_id == $id)>{{$name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3 mb-4">
            <label for="" class="form-label">Số lượng</label>
            <input type="text" class="form-control" name="quantity" value="{{$phone->quantity}}">
        </div>
        <div class="mt-3 mb-4">
            <label for="" class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="img">
            @if(!empty($phone->img))
                <div style="width: 100px; height: 100px;">
                    <img src="{{Storage::url($phone->img)}}"
                         style="max-width: 100%; max-height: 100%"
                         alt="">
                </div>
            @endif
        </div>
        <div class="mt-3 mb-4">
            <label for="" class="form-check-label">Mô tả</label><br>
            <textarea name="mota" id="" cols="100" row="10">{{$phone->mota}}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Cập nhật</button>

    </form>
@endsection