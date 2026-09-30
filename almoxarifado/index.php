<?php

declare(strict_types=1);

header("Content-Type: application/json; charset=UTF-8");

require_once "conexao.php";

$metodo = $_SERVER["REQUEST_METHOD"];

try {

    // POST - cadastrar peça

    if ($metodo === "POST") {

        $dados = json_decode(file_get_contents("php://input"), true);

        if (
            !isset($dados["nome"]) ||
            !isset($dados["categoria"]) ||
            !isset($dados["fornecedor"]) ||
            !isset($dados["quantidade"]) ||
            !isset($dados["preco_unitario"])
        ) {

            http_response_code(400);

            echo json_encode([
                "erro" => "Todos os campos são obrigatórios"
            ]);

            exit;
        }

        $categorias = [
            "eletrica",
            "mecanica",
            "hidraulica"
        ];

        if (!in_array($dados["categoria"], $categorias)) {

            http_response_code(400);

            echo json_encode([
                "erro" => "Categoria inválida"
            ]);

            exit;
        }

        if ($dados["quantidade"] < 0) {

            http_response_code(400);

            echo json_encode([
                "erro" => "A quantidade não pode ser negativa"
            ]);

            exit;
        }

        if ($dados["preco_unitario"] <= 0) {

            http_response_code(400);

            echo json_encode([
                "erro" => "O preço unitário deve ser maior que zero"
            ]);

            exit;
        }

        $sql = "INSERT INTO pecas
                (nome, categoria, fornecedor, quantidade, preco_unitario)
                VALUES
                (:nome, :categoria, :fornecedor, :quantidade, :preco_unitario)
                RETURNING id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":nome" => $dados["nome"],
            ":categoria" => $dados["categoria"],
            ":fornecedor" => $dados["fornecedor"],
            ":quantidade" => $dados["quantidade"],
            ":preco_unitario" => $dados["preco_unitario"]
        ]);

        $id = $stmt->fetchColumn();

        http_response_code(201);

        echo json_encode([
            "mensagem" => "Peça cadastrada com sucesso",
            "id" => $id
        ]);

        exit;
    }


    // GET - listar peças

    if ($metodo === "GET") {

        $sql = "SELECT * FROM pecas ORDER BY id";

        $stmt = $pdo->query($sql);

        $pecas = $stmt->fetchAll();

        echo json_encode([
            "mensagem" => "Peças encontradas com sucesso",
            "dados" => $pecas
        ]);

        exit;
    }


    // PUT - atualizar peça

    if ($metodo === "PUT") {

        $dados = json_decode(file_get_contents("php://input"), true);

        if (!isset($dados["id"])) {

            http_response_code(400);

            echo json_encode([
                "erro" => "O id é obrigatório"
            ]);

            exit;
        }

        if (
            !isset($dados["nome"]) ||
            !isset($dados["categoria"]) ||
            !isset($dados["fornecedor"]) ||
            !isset($dados["quantidade"]) ||
            !isset($dados["preco_unitario"])
        ) {

            http_response_code(400);

            echo json_encode([
                "erro" => "Todos os campos são obrigatórios"
            ]);

            exit;
        }

        $categorias = [
            "eletrica",
            "mecanica",
            "hidraulica"
        ];

        if (!in_array($dados["categoria"], $categorias)) {

            http_response_code(400);

            echo json_encode([
                "erro" => "Categoria inválida"
            ]);

            exit;
        }

        if ($dados["quantidade"] < 0) {

            http_response_code(400);

            echo json_encode([
                "erro" => "A quantidade não pode ser negativa"
            ]);

            exit;
        }

        if ($dados["preco_unitario"] <= 0) {

            http_response_code(400);

            echo json_encode([
                "erro" => "O preço unitário deve ser maior que zero"
            ]);

            exit;
        }

        $sql = "SELECT id FROM pecas WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":id" => $dados["id"]
        ]);

        if (!$stmt->fetch()) {

            http_response_code(404);

            echo json_encode([
                "erro" => "Peça não encontrada"
            ]);

            exit;
        }

        $sql = "UPDATE pecas
                SET nome = :nome,
                    categoria = :categoria,
                    fornecedor = :fornecedor,
                    quantidade = :quantidade,
                    preco_unitario = :preco_unitario
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":nome" => $dados["nome"],
            ":categoria" => $dados["categoria"],
            ":fornecedor" => $dados["fornecedor"],
            ":quantidade" => $dados["quantidade"],
            ":preco_unitario" => $dados["preco_unitario"],
            ":id" => $dados["id"]
        ]);

        echo json_encode([
            "mensagem" => "Peça atualizada com sucesso"
        ]);

        exit;
    }


    // DELETE - excluir peça

    if ($metodo === "DELETE") {

        $dados = json_decode(file_get_contents("php://input"), true);

        if (!isset($dados["id"])) {

            http_response_code(400);

            echo json_encode([
                "erro" => "O id é obrigatório"
            ]);

            exit;
        }

        $sql = "SELECT id FROM pecas WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":id" => $dados["id"]
        ]);

        if (!$stmt->fetch()) {

            http_response_code(404);

            echo json_encode([
                "erro" => "Peça não encontrada"
            ]);

            exit;
        }

        $sql = "DELETE FROM pecas WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":id" => $dados["id"]
        ]);

        echo json_encode([
            "mensagem" => "Peça excluída com sucesso"
        ]);

        exit;
    }


    // Método não permitido

    http_response_code(405);

    echo json_encode([
        "erro" => "Método não permitido"
    ]);

} catch (PDOException $e) {

    http_response_code(500);

    echo json_encode([
        "erro" => "Erro no banco de dados",
        "detalhes" => $e->getMessage()
    ]);
}