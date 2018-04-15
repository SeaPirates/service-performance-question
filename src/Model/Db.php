<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: DanielSilva
 * Date: 15/04/18
 * Time: 17:20
 */

namespace App\Model;


use App\Enum\QueryEnum;

class Db
{
    private $conexao;

    function __construct()
    {

        $mysqlHost = getenv("MYSQL_HOST");
        $mysqlPort = getenv("MYSQL_PORT");
        $mysqlUser = getenv("MYSQL_USER");
        $mysqlPass = getenv("MYSQL_PASS");

        $this->conexao = new \PDO(
            "mysql:host={$mysqlHost}:{$mysqlPort};dbname=metrics",
            $mysqlUser,
            $mysqlPass
        );
    }

    public function selectDataCount(array $params): array
    {
        if (strtoupper($params['banca']) == "ALL") {
            $query = $this->conexao->prepare(QueryEnum::QUERY_DATA_COUNT);
            $query->execute([
               "dataIni" => $params['date_begin'],
               "dataFim" => $params['date_end']
            ]);
        } else {
            $query = $this->conexao->prepare(QueryEnum::QUERY_DATA_COUNT_WITH_BANCA);
            $query->execute([
                "dataIni" => $params['date_begin'],
                "dataFim" => $params['date_end'],
                "banca" => $params['banca']
            ]);
        }

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

}