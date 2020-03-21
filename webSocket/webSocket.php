<?php
/**
 * Created by PhpStorm.
 * User: appchina
 * Date: 2020/3/21
 * Time: 11:35 AM
 */

$ws = new Swoole\WebSocket\Server('0.0.0.0',9502);

$ws->on('open',function($ws,$request){
    var_dump($request->id,$request->get,$request->server);
    $ws->push($request->id,"hello,welcome\n");
});

$ws->on('message',function($ws,$frame){
    echo "Message :{$frame->data}\n";
    $ws->push($frame->fd,"server:{$frame->data}");
});

$ws->on('close',function($ws,$fd){
    echo "client-{$fd} is closed \n";
});

$ws->start();

