@extends('admin.layouts.app')
@section('title', isset($role) ? '修改角色' : '添加角色')
@section('body')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>ROLE</h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">角色</li>
                        <li class="breadcrumb-item active">{{isset($role) ? '修改' : '添加'}}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>@if(isset($role))修改角色@else添加角色@endif</h2>
                    </div>
                    <div class="body">
                        @if(isset($role))
                            <form action="{{route('admin.roles.update', $role->id)}}" method="post" novalidate>
                                {{method_field('PUT')}}
                            @else
                            <form action="{{route('admin.roles.store')}}" method="post" novalidate>
                            @endif
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>角色标题</label>
                                <input type="text" name="title" class="form-control" value="{{old('title', isset($role->title) ? $role->title : '')}}" required>
                            </div>
                            <div class="form-group">
                                <label>角色名</label>
                                <input type="text" name="name" class="form-control" value="{{old('name', isset($role->name) ? $role->name : '')}}" required>
                            </div>
                                <div class="form-group">
                                    <label>权限</label>
                                    <br/>

                                    @foreach($permissions as $permission)
                                    <label class="fancy-checkbox">
                                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}"@if(isset($role) && $role->permissions->contains('id', $permission->id)) checked @endif>
                                        <span>{{$permission->title}}</span>
                                    </label>
                                    @endforeach
                                    <p id="error-checkbox"></p>
                                </div>

                                <button type="submit" class="btn btn-primary">提交</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection