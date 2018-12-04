<?php

//将当前请求的路由名称转换为 CSS 类名称，作用是允许我们针对某个页面做页面样式定制
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

//高亮导航;$link:当前导航链接
function active_menu($link, $class='active'){
    return substr_count(url()->full(), $link) ? 'active' : false;
}

//截取字符串
function make_excerpt($value, $length = 200)
{
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
    return mb_substr($excerpt, 0, $length);
}