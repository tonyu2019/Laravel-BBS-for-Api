@extends('index.layouts.app')
@section('title', isset($category) ? $category->name : '帖子首页')
@section('body')
    <div class="row">
        <div class="col-lg-9 col-md-9 topic-list">
            @if (isset($category))
                <div class="alert alert-info" role="alert">
                    {{ $category->name }} ：{{ $category->description }}
                </div>
            @endif
            <div class="panel panel-default">

                <div class="panel-heading">
                    <ul class="nav nav-pills">
                        <li role="presentation" class="active"><a href="#">最后回复</a></li>
                        <li role="presentation"><a href="#">最新发布</a></li>
                    </ul>
                </div>

                <div class="panel-body">
                    {{-- 话题列表 --}}
                    @include('index.topic._topic_list', ['topics' => $topics])
                    {{-- 分页 --}}

                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 sidebar">
            @include('index.topic._sidebar')
        </div>
    </div>
    @endsection