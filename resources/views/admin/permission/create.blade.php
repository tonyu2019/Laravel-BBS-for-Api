@extends('admin.layout._base')
@section('title', isset($permission) ? '修改权限' : '添加权限')
@section('body')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>PERMISSION</h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">权限</li>
                        <li class="breadcrumb-item active">{{isset($permission) ? '修改权限' : '添加权限'}}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>@if(isset($permission))修改权限@else添加权限@endif</h2>
                    </div>
                    <div class="body">
                        @if(isset($permission))
                            <form action="{{route('permissions.update', $permission->id)}}" method="post" novalidate>
                                {{method_field('PUT')}}
                            @else
                            <form action="{{route('permissions.store')}}" method="post" novalidate>
                            @endif
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>权限标题</label>
                                <input type="text" name="title" class="form-control" value="{{old('title', isset($permission->title) ? $permission->title : '')}}" required>
                            </div>
                            <div class="form-group">
                                <label>权限名</label>
                                <input type="text" name="name" class="form-control" value="{{old('name', isset($permission->name) ? $permission->name : '')}}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">提交</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection