@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="content-wrapper">
@include('partials.content-header',['name' =>'menus','key' =>'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('menus.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label >Tên Menus</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       placeholder="Nhập tên Menus">
                            </div>
                            <div class="form-group">
                                <label >Chọn menus cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Chọn Menu cha</option>
                                    {!! $optionSelect !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection



