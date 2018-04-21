<?php
/**
 * Created by PhpStorm.
 * User: DanielSilva
 * Date: 15/04/18
 * Time: 18:08
 */

namespace App\Enum;


class QueryEnum
{
    const __default = self::QUERY_DATA_COUNT;

    const QUERY_DATA_COUNT = "SELECT 
                                SUM(quant_questoes) as quant_questoes, 
                                SUM(quant_acertos) as quant_acertos 
                              FROM metrics.exercicios 
                              WHERE data_registro 
                                BETWEEN :dataIni AND :dataFim";

    const QUERY_DATA_COUNT_WITH_BANCA = "SELECT 
                                            SUM(quant_questoes) as quant_questoes, 
                                            SUM(quant_acertos) as quant_acertos 
                                          FROM metrics.exercicios 
                                          WHERE banca = :banca                                          
                                          AND data_registro BETWEEN :dataIni AND :dataFim";
}