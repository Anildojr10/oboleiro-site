CREATE DATABASE oboleiro;
USE oboleiro;

CREATE TABLE produtos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100),
  preco DECIMAL(6,2),
  imagem VARCHAR(100)
);

INSERT INTO produtos (nome, preco, imagem) VALUES
('Bolo de Chocolate', 45.00, 'bolo1.jpg'),
('Torta de Limão', 38.00, 'torta1.jpg'),
('Esfirra de Carne', 7.50, 'salgado1.jpg');

CREATE TABLE pedidos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  cliente_nome VARCHAR(100),
  item VARCHAR(100),
  quantidade INT,
  preco DECIMAL(6,2),
  data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);