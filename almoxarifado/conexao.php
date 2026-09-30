<?php

declare(strict_types=1);

$host = "192.168.10.102";
$port = "5432";
$dbname = "almoxarifado";
$user = "postgres";
$password = "indiana";

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

try {

    $pdo = new PDO($dsn, $user, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {

    header("Content-Type: application/json; charset=UTF-8");

    http_response_code(500);

    echo json_encode([
        "erro" => "Erro ao conectar com o banco de dados",
        "detalhes" => $e->getMessage()
    ]);

    exit;
}