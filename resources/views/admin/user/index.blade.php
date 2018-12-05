@extends('admin.layouts.app')
@section('title', '用户管理')
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
                        <li class="breadcrumb-item active">首页</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>用户列表</h2>
                    </div>

                    <div class="body">
                        @include('layouts._message')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered m-b-0 c_list">
                                        <thead>
                                        <tr>
                                            <th>
                                                <label class="fancy-checkbox">
                                                    <input class="select-all" type="checkbox" name="checkbox">
                                                    <span></span>
                                                </label>
                                            </th>
                                            <th>用户</th>
                                            <th>邮箱</th>
                                            <th>签名</th>
                                            <th>角色</th>
                                            <th>通知</th>
                                            <th>更新时间</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td style="width: 50px;">
                                                    <label class="fancy-checkbox">
                                                        <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <img src="{{$user->avatar ? $user->avatar : '/avatar/aratar_485.jpg'}}" class="rounded-circle avatar" alt="">
                                                    <p class="c_name">{{$user->name}}</p>
                                                </td>

                                                <td>
                                                    {{$user->email}}
                                                </td>
                                                <td>
                                                    {{$user->intro}}
                                                </td>
                                                <td>

                                                    @if(count($user->roles))
                                                        @foreach($user->roles as $role)
                                                            {{$role->title}} @if($loop->last<1),@endif
                                                        @endforeach
                                                    @else
                                                        无
                                                    @endif

                                                </td>
                                                <td><span class="text-primary"><i class="icon-bubbles"></i> {{$user->notification_count}}</span></td>
                                                <td>
                                                    {{$user->updated_at}}
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-info" title="Edit"><i
                                                                class="fa fa-edit"></i></a>
                                                    <form action="{{route('admin.users.destroy', $user->id)}}" method="post" style="display: inline;">{{csrf_field()}}{{method_field('DELETE')}}<button type="submit" class="btn btn-danger js-sweetalert"><i class="fa fa-trash-o"></i></button></form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px;">
                            <div class="col-sm-12 col-md-5">
                                <a href="{{route('admin.users.create')}}" class="btn btn-success">添加用户</a>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="pull-right">
                                    {{$users->links('vendor.pagination.admin')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection