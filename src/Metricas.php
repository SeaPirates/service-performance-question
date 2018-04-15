<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: DanielSilva
 * Date: 15/04/18
 * Time: 11:56
 */

namespace App;


use App\Model\Db;
use App\Model\Desempenho;

class Metricas
{
    private $db;
    private $desempenho;

    function __construct()
    {
        $this->db = new Db();
        $this->desempenho = new Desempenho();
    }

    public function get(array $params): array
    {
        $resultDb = $this->db->selectDataCount($params);
        $cal = $this->desempenho->gerarCalculo($resultDb[0]);
        return ["result" => $cal];
    }
}