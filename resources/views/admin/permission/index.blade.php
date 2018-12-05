@extends('admin.layouts.app')
@section('title', '权限管理')
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
                        <li class="breadcrumb-item active">首页</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>权限列表</h2>
                    </div>
                    <div class="body">
                        @include('layouts._message')
                        <div class="row">
                            <div class="col-lg-12">
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
                                            <th>权限标题</th>
                                            <th>权限名称</th>
                                            <th>更新时间</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($permissions as $permission)
                                            <tr>
                                                <td style="width: 50px;">
                                                    <label class="fancy-checkbox">
                                                        <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    {{$permission->title}}
                                                </td>
                                                <td>
                                                    <p class="c_name">{{$permission->name}}</p>
                                                </td>
                                                <td>
                                                    {{$permission->updated_at}}
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.permissions.edit', $permission->id)}}" class="btn btn-info" title="Edit"><i
                                                                class="fa fa-edit"></i></a>
                                                    <form action="{{route('admin.permissions.destroy', $permission->id)}}" method="post" style="display: inline;">{{csrf_field()}}{{method_field('DELETE')}}<button type="submit" class="btn btn-danger js-sweetalert"><i class="fa fa-trash-o"></i></button></form>
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
                                <div><a href="{{route('admin.permissions.create')}}" class="btn btn-success">添加权限</a></div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="pull-right">
                                    {{$permissions->links('vendor.pagination.admin')}}
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection