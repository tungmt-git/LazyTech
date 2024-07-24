@extends('layouts.master')
@section('title')
    Sửa hãng sản phẩm {{$comp->name}}
@endsection

@section('content')
    <form action="{{route('comp.update',$comp)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <label for="" class="form-label">Tên</label>
            <input type="text" class="form-control" name="name" value="{{$comp->name}}">
        </div>
        <div class="row">
            <label for="" class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="img">
            @if(!empty($comp->img))
                <div style="width: 100px; height: 100px;">
                    <img src="{{Storage::url($comp->img)}}"
                         style="max-width: 100%; max-height: 100%"
                         alt="">
                </div>
            @endif
        </div><br>
        <button type="submit" class="btn btn-success">Sửa</button>
    </form>
@endsection