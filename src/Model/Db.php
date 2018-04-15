<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: DanielSilva
 * Date: 15/04/18
 * Time: 17:20
 */

namespace App\Model;


class Db
{
    private $conexao;

    function __construct()
    {
        $this->conexao = new \PDO(
            "mysq:host={$_ENV['MYSQL_HOST']}:{$_ENV['MYSQL_PORT']}",
            $_ENV["MYSQL_USER"],
            $_ENV['MYSQL_PASS']
        );
    }

    public function selectDataCount(array $params): array
    {
        if (strtoupper($params['banca']) == "ALL") {
            $query = $this->conexao->prepare(
                "SELECT SUM(quant_questoes) as quant_questoes, SUM(quant_acertos) as quant_acertos FROM metrics.exercicios WHERE data_registro BETWEEN :dataIni AND :dataFim"
            );
        } else {

        }
    }

}