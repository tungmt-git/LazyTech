@extends('layouts.master')
@section('title')
    Chi tiết {{$phone->name}}
@endsection

@section('content')
    <ul>
        <li>Tên: {{$phone->name}}</li>
        <li>Giá tiền:$ {{$phone->cost}}</li>
        <li>Nhà sản xuất: {{$phone->comp->name}}</li>
        <li>Ảnh:
            @if(!empty($phone->img))
                <div style="width: 100px; height: 100px;">
                    <img src="{{Storage::url($phone->img)}}"
                         style="max-width: 100%; max-height: 100%"
                         alt="">
                </div>
            @endif
        </li>
        <li>Số lượng: {{$phone->quantity}}</li>
        <li>Mô tả: <br>
            <textarea name="" id="" disabled row="10" cols="100">{{$phone->mota}}</textarea>
        </li>
    </ul>
    <a href="{{route('phone.index')}}" class="btn btn-success">Quay lại</a>
@endsection