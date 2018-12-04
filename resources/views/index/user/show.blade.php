@extends('index.layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('body')

    <div class="row">

        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media">
                        <div align="center">
                            <img class="thumbnail img-responsive" src="{{$user->avatar ? $user->avatar : '/avatar/aratar_1044.jpg'}}" width="300px" height="300px">
                        </div>
                        <div class="media-body">
                            <hr>
                            <h4><strong>个人简介</strong></h4>
                            <p>{{ $user->intro }}</p>
                            <hr>
                            <h4><strong>注册于</strong></h4>
                            <p>{{ $user->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                <span>
                    <h1 class="panel-title pull-left" style="font-size:30px;">{{ $user->name }} <small>{{ $user->email }}</small></h1>
                </span>
                </div>
            </div>
            <hr>

            {{-- 用户发布的内容 --}}
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="{{!active_menu(route('users.show', [$user->id, 'tab' => 'replies'])) ? 'active' : ''}}"><a href="{{route('users.show', $user->id)}}">Ta 的话题</a></li>
                        <li class="{{active_menu(route('users.show', [$user->id, 'tab' => 'replies']))}}"><a href="{{ route('users.show', [$user->id, 'tab' => 'replies']) }}">Ta 的回复</a></li>
                    </ul>
                    @if(request('tab'))
                    @include('index.user._replies', ['replies' => $user->replies()->paginate(10)])
                        @else
                        @include('index.user._topics', ['topics' => $user->topics()->paginate(10)])
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection