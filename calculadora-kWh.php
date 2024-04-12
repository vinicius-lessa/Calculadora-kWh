<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Content-type: application/json; application/x-www-form-urlencoded; charset=UTF-8');

$qtdHoras   = isset($_GET["qtdHoras"]) ? $_GET["qtdHoras"] : 0;
$qtdDias    = isset($_GET["qtdDias"]) ? $_GET["qtdDias"] : 0;
$potencia   = isset($_GET["potencia"]) ? $_GET["potencia"] : 0;

if (!is_numeric($qtdHoras) ||
    !is_numeric($qtdDias)||
    !is_numeric($potencia)):

    http_response_code(400); // Bad Request

    echo json_encode([
        "error" => "400 - Bad Request / Parâmetros Inválidos"
    ]);

    exit;
endif;

$valorkWh = 1.10;

$horasTotais = $qtdHoras * $qtdDias;
$qtdkWh = $potencia * $horasTotais / 1000;

$valorTotal = $qtdkWh * $valorkWh;

http_response_code(200);

echo json_encode([
    "valorTotal" => number_format($valorTotal, 2, ",")
]);

?>