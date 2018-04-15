<?php

/**
 * Created by PhpStorm.
 * User: DanielSilva
 * Date: 15/04/18
 * Time: 16:38
 */

use \PHPUnit\Framework\TestCase;

class DesempenhoTest extends TestCase
{

    public function testIntanciaDaClasse()
    {
        $d = new \App\Model\Desempenho();
        $this->assertInstanceOf(\App\Model\Desempenho::class, $d);
        return $d;
    }

    /**
     * @depends testIntanciaDaClasse
     */
    public function testCalcularDesempenhoSemDados(\App\Model\Desempenho $d)
    {
        $this->assertEquals(0, $d->gerarCalculo(
            [
                "quant_questoes" => 0,
                "quant_acertos" => 0
            ]
        ));

        return $d;
    }

    /**
     * @depends testCalcularDesempenhoSemDados
     */
    public function testCalculaODesempenhoDaProva(\App\Model\Desempenho $d)
    {
        $this->assertEquals(100.00, $d->gerarCalculo(
            [
                "quant_questoes" => 3,
                "quant_acertos" => 3
            ]
        ));
    }
}