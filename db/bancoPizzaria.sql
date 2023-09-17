-- criando banco de dados
DROP DATABASE IF EXISTS pizzaria;
CREATE DATABASE IF NOT EXISTS pizzaria;

-- selecionando banco
USE pizzaria;

-- tabela pizza
CREATE TABLE pizza (
    idPizza INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sabor VARCHAR(50) NOT NULL,
    tipo VARCHAR(15) NOT NULL,
    preco DECIMAL(5, 2) NOT NULL
); 

-- inserindo alguns valores
INSERT INTO pizza(sabor, tipo, preco) 
VALUES ("Mussarela",  "Salgada", 25.90),
("Frango com catupiri", "Salgada", 29.90),
("Chocolate", "Doce", 34.90);

-- selecionando dados
SELECT idPizza, sabor, tipo, preco FROM pizza;
SELECT sabor, tipo, preco FROM pizza WHERE idPizza = 1;

--  modificando dados
UPDATE pizza 
SET sabor = 'Chocolate com morango', tipo = 'Doce', preco = 30.90
WHERE idPizza = 1;

-- deletando pizza
DELETE FROM pizza WHERE idPizza = 2;