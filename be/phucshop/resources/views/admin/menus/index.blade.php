@extends('layouts.admin')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('js')
    <script src="{{asset('vendors/select2/sweetAlert2/sweetalert2@11.js')}}"></script>
    <script type="text/javascript" src="{{asset('admins/main.js') }}"></script>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name' =>'menus','key' =>'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('menus.create')}}" class="btn btn-success float-lg-right m-2">add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Menus</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menus as $menu)

                                <tr>
                                    <th scope="row">{{$menu->id}}</th>
                                    <td>{{$menu->name}}</td>
                                    <td>
                                        <a href="{{route('menus.edit',['id' =>$menu->id]) }}"
                                           class="btn btn-default">Edit</a>
                                        <a href=""
                                           data-url="{{route('menus.delete',['id' =>$menu->id])}}"
                                           class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md12">
                        {{$menus->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



