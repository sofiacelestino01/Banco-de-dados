Para criar a tabela 
-- CREATE TABLE produtos (
--   id SERIAL PRIMARY KEY,
--   nome VARCHAR(100) NOT NULL,
--   categoia VARCHAR (50) NOT NULL,
--   marca VARCHAR (50) NOT NULL,
--   preco NUMERIC (10,2) NOT NULL,
--   estoque INTEGER NOT NULL,
--   data_cadastro DATE NOT NULL
-- );

Para acahar 
SELECT COUNT (*) AS
total_de_produtos
FROM produtos;

outra variação 
SELECT COUNT (*) AS
total_de_produtos
FROM produtos
WHERE estoque < 10;

media 
SELECT AVG(preco) FROM produtos;
aredondar meia
SELECT ROUND(AVG(preco),2) AS preco_medio
FROM produtos;
fazer soma 
SELECT SUM(estoque) AS total_de_produtos
FROM produtos;
todos os comantos
SELECT COUNT(*) AS total_de_podutos,
MIN(preco) AS menor_valor,
MAX(preco) AS maior_valor,
ROUND(AVG(preco),2) AS media_valores,
SUM(estoque) AS total_peças
FROM produtos;

OUTRO 
SELECT nome,
preco,
estoque,
preco * estoque AS total_estoque
FROM produtos
ORDER BY total_estoque DESC;

ver tipo todos os precos 
SELECT 
SUM(preco*estoque) AS patrimonio_total
FROM produtos;