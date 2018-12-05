<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            background-color: #000000;
            text-align: center;
            color: #ffffff;
        }
        img{
            max-width:100%;
        }
        .title{
            font-weight:bold;
            font-size:28px;
        }
        .text-red{
            color: #ff0000;
        }
        .desc{
            font-size:24px;
            font-weight: bold;
        }
        .url{
            font-size: 14px;
        }
        .mark a{
            color: #ffffff;
            text-decoration: none;
        }


    </style>
</head>
<body>
<img src="/avatar/win_error.gif" alt="">
<p class="title">“403” - 网页.<span class="text-red">出.</span>错</p>
<div class="desc">
    <p class="url">{{config('app.url')}}</p>
    <p class="mark"><span class="text-red">即将</span>.返回.<a href="{{config('app.url')}}" target="_blank">{{config('app.name')}}</a><span class="text-red">首页</span></p>
</div>
</body>
</html>