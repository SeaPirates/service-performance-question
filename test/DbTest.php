<?php

/**
 * Created by PhpStorm.
 * User: DanielSilva
 * Date: 15/04/18
 * Time: 17:20
 */

use \PHPUnit\Framework\TestCase;

class DbTest extends TestCase
{
    public function testDeveConectarNoBancoDeDados()
    {
        $this->assertInstanceOf(\App\Model\Db::class, new \App\Model\Db());
    }
}