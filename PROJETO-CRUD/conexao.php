<?php

$host = "seu id";
$usuario = "seu usuario";
$senha = "sua senha";
$banco = "seu banco";

$pdo = new PDO(
"pgsql:host=$host;port=5432;dbname=$banco",
$usuario,
$senha
);