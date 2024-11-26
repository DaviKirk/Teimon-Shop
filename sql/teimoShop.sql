CREATE DATABASE lojasTeimo

CREATE TABLE estoqueTeimo (
    idProduto INT AUTO_INCREMENT PRIMARY KEY,
    nomeProduto VARCHAR(100) NOT NULL,
    valorProduto DECIMAL(5, 2) NOT NULL,
    descProduto VARCHAR(255),
    imgProduto VARCHAR(50)
);

UPDATE estoqueteimo
SET imgProduto = CASE nomeProduto
    WHEN 'Sausages' THEN 'Sausages.png'
    WHEN 'Macaron box' THEN 'Macaron_box.png'
    WHEN 'Pizza' THEN 'Pizza.png'
    WHEN 'Potato chips' THEN 'Potato_chips.png'
    WHEN 'Beer case' THEN 'Beer_case.png'
    WHEN 'Milk' THEN 'Milk.png'
    WHEN 'Yeast' THEN 'Yeast.png'
    WHEN 'Sugar' THEN 'Sugar.png'
    WHEN 'Juice concentrate' THEN 'Juice.png'
    WHEN 'Mosquito spray' THEN 'Mosquito_spray.png'
    ELSE NULL
END;
