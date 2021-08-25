<?php

namespace DemoHandler;

use Api\Service\DemoServiceIf;
use Api\Service\AddResponse;
use Api\Common\Status;
use Api\Common\Code;
use Api\Service\PersonRequest;
use Api\Service\PersonResponse;
use Api\Common\Person;
use Api\Common\Gender;

class DemoServiceHandler implements DemoServiceIf
{
    public function add($a, $b)
    {
        return new AddResponse([
            'status' => new Status(['code' => Code::OK, 'message' => '加法完成']),
            'result' => $a + $b,
        ]);
    }

    public function getPerson(PersonRequest $req)
    {
        return new PersonResponse([
            'status' => new Status(['code' => Code::OK, 'message' => '个人信息']),
            'data' => new Person([
                'name' => $req->name,
                'age' => mt_rand(20, 30),
                'gender' => Gender::MALE,
            ]),
        ]);
    }

}

