@extends('admin.layout._base')
@section('title', '回复管理')
@section('body')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>REPLY</h2>
                </div>
                <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    <ul class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="/"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">回复</li>
                        <li class="breadcrumb-item active">首页</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>回复列表</h2>
                    </div>
                    <div class="body">
                        @include('index.layout._message')
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
                                    <th>作者</th>
                                    <th>内容</th>
                                    <th>回复至</th>
                                    <th>更新时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($replies as $reply)
                                <tr>
                                    <td style="width: 50px;">
                                        <label class="fancy-checkbox">
                                            <input class="checkbox-tick" type="checkbox" name="checkbox">
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        <img src="{{$reply->user->avatar}}" class="rounded-circle avatar" alt="">
                                        <p class="c_name">{{$reply->user->name}}</p>
                                    </td>
                                    <td>
                                        {{mb_substr($reply->content,0, 50)}}
                                    </td>
                                    <td>
                                        {{$reply->post->title}}
                                    </td>
                                    <td>
                                        {{$reply->updated_at}}
                                    </td>
                                    <td>
                                        <form action="{{route('admin.replies.destroy', $reply->id)}}" method="post" style="display: inline;">{{csrf_field()}}{{method_field('DELETE')}}<button type="submit" class="btn btn-danger js-sweetalert"><i class="fa fa-trash-o"></i></button></form>
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="row" style="margin-top: 15px;">
                            <div class="col-sm-12 col-md-5">
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="pull-right">
                                    {{$replies->links('vendor.pagination.admin')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection