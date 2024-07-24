@extends('layouts.master')
@section('title')
    Danh sách hãng Điện Thoại
@endsection

@section('content')
    <a href="{{route('comp.create')}}" class='btn btn-success'>Thêm hãng điện thoại</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <img src="{{Storage::url($item->img)}}" alt="" width="100">
                    </td>
                    <td>
                        <a href="{{route('comp.show', $item)}}" class="btn btn-info">
                            Xem</a>
                        <a href="{{route('comp.edit', $item)}}" class="btn btn-success">
                            Sửa</a>
                        <form action="{{route('comp.destroy', $item)}}" method="POST">
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