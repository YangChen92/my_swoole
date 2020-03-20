<?php
/**
 * Created by PhpStorm.
 * User: appchina
 * Date: 2020/3/21
 * Time: 12:25 AM
 */

$client = new Swoole\Client(SWOOLE_SOCK_TCP);

if(!$client->connect('127.0.0.1',9501,-1)){
    exit("connect failed.error:{$client->errCode}\n");
}

$client->send("hello world\n");
echo $client->recv();
$client->close();