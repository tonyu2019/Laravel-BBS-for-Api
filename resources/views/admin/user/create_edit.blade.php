@extends('admin.layouts.app')
@section('title', isset($user) ? '修改用户' : '添加用户')
@section('body')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>USER</h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">用户</li>
                        <li class="breadcrumb-item active">{{isset($user) ? '修改' : '添加'}}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>@if(isset($user))修改用户@else添加用户@endif</h2>
                    </div>
                    <div class="body">
                        @include('layouts._error')
                        @if(isset($user))
                            <form action="{{route('admin.users.update', $user->id)}}" method="post" novalidate>
                                {{method_field('PUT')}}
                            @else
                            <form action="{{route('admin.users.store')}}" method="post" novalidate>
                            @endif
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>姓名</label>
                                <input type="text" name="name" class="form-control" value="{{old('name', isset($user) ? $user->name : '')}}" required>
                            </div>
                                <div class="form-group">
                                    <label>邮箱</label>
                                    <input type="text" name="email" class="form-control" value="{{old('email', isset($user) ? $user->email : '')}}" required>
                                </div>
                                <div class="form-group">
                                    <label>密码</label>
                                    <input type="text" name="password" class="form-control" value="{{old('password', isset($user) ? $user->password : create_pwd())}}" required>
                                </div>
                                <div class="form-group">
                                    <label>个人简介</label>
                                    <textarea name="intro" class="form-control" rows="3">{{old('intro', isset($user) ? $user->intro : '')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>角色</label>
                                    <br/>
                                    @foreach($roles as $role)
                                    <label class="fancy-radio">
                                        <input type="radio" name="role" value="{{$role->name}}" @if(isset($user) && $user->roles->contains('id', $role->id)) checked @elseif($loop->first) checked @endif>
                                        <span><i></i>{{$role->title}}</span>
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