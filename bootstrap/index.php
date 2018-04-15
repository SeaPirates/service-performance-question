<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require_once __DIR__ . "/../vendor/autoload.php";

$params = file_get_contents("php://input");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $metricas = new \App\Metricas();
    echo json_encode($metricas->get(json_decode($params)));
} else {
    throw new \Exception("Requisições dieferentes de POST não permitida", -500);
}
