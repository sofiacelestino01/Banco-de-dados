<?php

$host = "192.168.10.102";
$usuario = "postgres";
$senha = "indiana";
$banco = "manutencao";

$pdo = new PDO(
    "pgsql:host=$host;port=5432;dbname=$banco",
    $usuario,
    $senha
);