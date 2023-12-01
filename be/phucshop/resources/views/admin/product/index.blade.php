@extends('layouts.admin')
@section('title')
    <title>Add product</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('admins/product/index/list.css')}}"/>
@endsection
@section('js')
    <script src="{{asset('vendors/select2/sweetAlert2/sweetalert2@11.js')}}"></script>
    <script type="text/javascript" src="{{asset('admins/main.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name' =>'Product','key' =>'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('product.create')}}" class="btn btn-success float-lg-right m-2">add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình Ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $productItem)
                                <tr>
                                    <th scope="row">{{$productItem->id}}</th>
                                    <td>{{$productItem->name}}</td>
                                    <td>{{number_format($productItem->price)}}</td>
                                    <td>
                                        <img class="product_image_150_100" src="{{$productItem->feature_image_path}}"
                                             alt="">
                                    </td>
                                    <td>{{optional($productItem->category)->name}}</td>
                                    <td>
                                        <a href="{{route('product.edit',['id' =>$productItem->id])}}"
                                           class="btn btn-default">Edit</a>
                                        <a href=""
                                           data-url="{{route('product.delete',['id' =>$productItem->id])}}"
                                           class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md12">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



