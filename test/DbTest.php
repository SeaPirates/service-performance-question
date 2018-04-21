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
        $d = new \App\Model\Db();
        $this->assertInstanceOf(\App\Model\Db::class, $d);

        return $d;
    }

    /**
     * @depends testDeveConectarNoBancoDeDados
     */
    public function testDeveTrazerUmArrayDeDados(\App\Model\Db $d)
    {
        $this->assertArrayHasKey("quant_questoes", $d->selectDataCount([
            "banca" => "all",
            "date_begin" => '2018-01-01',
            "date_end" => '2018-12-31'
        ])[0]);

        $this->assertArrayHasKey("quant_acertos", $d->selectDataCount([
            "banca" => "all",
            "date_begin" => '2018-01-01',
            "date_end" => '2018-12-31'
        ])[0]);

        $this->assertEquals(
            [
                "quant_questoes" => 0,
                "quant_acertos" => 0
            ],
            $d->selectDataCount([
                "banca" => "all",
                "date_begin" => '2018-01-01',
                "date_end" => '2018-12-31'
            ])[0]
        );
    }
}