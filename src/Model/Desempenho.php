<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: DanielSilva
 * Date: 15/04/18
 * Time: 16:19
 */

namespace App\Model;


class Desempenho
{
    public function gerarCalculo(array $dataDb): float
    {
        if ($dataDb['quant_questoes'] == 0) {
            return 0;
        }

        return ((int) $dataDb['quant_questoes'] / (int) $dataDb['quant_acertos']) * 100;
    }
}