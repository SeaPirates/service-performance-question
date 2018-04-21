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
use App\Model\Validar;

class Metricas
{
    private $db;
    private $desempenho;
    private $validar;

    function __construct()
    {
        $this->db = new Db();
        $this->desempenho = new Desempenho();
        $this->validar = new Validar();
    }

    public function get(array $params): array
    {
        $this->validar->request($params['auth']);
        $resultDb = $this->db->selectDataCount($params['params']);
        $cal = $this->desempenho->gerarCalculo($resultDb[0]);
        return ["result" => $cal];
    }
}