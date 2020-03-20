<?php
/**
 * Created by PhpStorm.
 * User: appchina
 * Date: 2020/3/21
 * Time: 12:08 AM
 */
$serv = new Swoole\Server("127.0.0.1",9501);

//监听连接进入事件
$serv->on('Connect', function ($serv,$fd){
    echo "Client : Connect .\n";
});

//监听数据接收事件
$serv->on('Receive', function($serv,$fd,$from_id,$data){
    echo "我是server+" . $data;
    $serv->send($fd,"Server:".$data);
});

//监听连接关闭事件
$serv->on('Close',function($serv,$fd){
    echo "Client:Close.\n";
});

//启动服务器
$serv->start();
