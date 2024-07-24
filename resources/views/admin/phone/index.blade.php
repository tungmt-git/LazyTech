@extends('layouts.master')
@section('title')
    Danh sách Điện Thoại
@endsection

@section('content')
<a href="{{route('phone.create')}}" class='btn btn-success'>Thêm điện thoại</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Ảnh</th>
                <th>Số Lượng</th>
                <th>Hãng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>${{$item->cost}}</td>
                    <td>
                        <img src="{{Storage::url($item->img)}}" alt="" width="100">
                    </td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->comp->name}}</td>
                    <td>
                        <a href="{{route('phone.show', $item)}}" class="btn btn-info">
                            Xem</a>
                        <a href="{{route('phone.edit', $item)}}" class="btn btn-success">
                            Sửa</a>
                        <form action="{{route('phone.destroy', $item)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection