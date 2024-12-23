
CREATE DATABASE lojasTeimo;

CREATE TABLE estoqueTeimo (
    idProduto INT AUTO_INCREMENT PRIMARY KEY,
    nomeProduto VARCHAR(100) NOT NULL,
    valorProduto DECIMAL(5, 2) NOT NULL,
    descProduto VARCHAR(255),
    imgProduto VARCHAR(50)
);

drop table estoqueteimo;

INSERT INTO estoqueTeimo (nomeProduto, valorProduto, descProduto, imgProduto) VALUES
('Sausages', 10.95, 'Saborosas linguiças frescas, ideias para churrascos.', 'Sausages.png'),
('Macaron box', 11.95, 'Caixa com macarons franceses.', 'Macaron_box.png'),
('Pizza', 9.95, 'Pizza congelada com ingredientes selecionados.', 'Pizza.png'),
('Potato chips', 14.95, 'Batatas fritas crocantes, perfeitas para qualquer lanche.', 'Potato_chips.png'),
('Beer case', 149.00, 'Caixa com 24 latas de cerveja premium.', 'Beer_case.png'),
('Milk', 5.50, 'Leite integral fresco e nutritivo.', 'Milk.png'),
('Yeast', 8.95, 'Fermento biológico para pães e receitas.', 'Yeast.png'),
('Sugar', 4.95, 'Açúcar refinado, essencial para doces e bebidas.', 'Sugar.png'),
('Juice', 12.95, 'Concentrado de suco para preparo rápido e saboroso.', 'Juice.png'),
('Mosquito spray', 32.95, 'Spray repelente eficaz contra mosquitos e insetos.', 'Mosquito_spray.png');