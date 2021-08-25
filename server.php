<?php

use Thrift\Protocol\TJSONProtocol;
use Thrift\Transport\TPhpStream;
use Thrift\Transport\TMemoryBuffer;
use DemoHandler\DemoServiceHandler;
use Api\Service\DemoServiceProcessor;


require 'vendor/autoload.php';


ob_start();

$transI = new TPhpStream(TPhpStream::MODE_R);
$transI->open();
$pi = new TJSONProtocol($transI);

$transO = new TMemoryBuffer();
$transO->open();
$po = new TJSONProtocol($transO);

$handler = new DemoServiceHandler();
$process = new DemoServiceProcessor($handler);

$process->process($pi, $po);

$transI->close();
$transO->close();

echo $transO->getBuffer();

if (isset($_GET['debug'])) {
    file_put_contents(__FILE__ . '.log',
        date('c ') . json_encode([
            's' => $_SERVER,
            'i' => file_get_contents('php://input'),
            'o' => ob_get_contents()
        ], JSON_UNESCAPED_SLASHES) . "\r\n",
        FILE_APPEND);
}
