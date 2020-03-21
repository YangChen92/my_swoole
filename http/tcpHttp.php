<?php
/**
 * Created by PhpStorm.
 * User: appchina
 * Date: 2020/3/21
 * Time: 1:05 AM
 */

$http = new Swoole\Http\Server("0.0.0.0",80);
$http->on('request',function($request,$response){
    var_dump($request->get,$request->post);
    $response->header("Content-Type","text/html;charset=utf-8");
    $response->end("hello world");
});

$http->start();