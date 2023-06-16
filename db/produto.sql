CREATE TABLE tb_produto(
id_produto INT NOT NULL AUTO_INCREMENT,
nome VARCHAR(255) NOT NULL,
descricao VARCHAR(255) NOT NULL,
preco FLOAT NOT NULL,
quantidade INT NOT NULL,
id_categoria INT NOT NULL REFERENCES tb_categoria(id_categoria),
PRIMARY KEY(id_produto)
);