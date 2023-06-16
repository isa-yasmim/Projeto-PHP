CREATE TABLE tb_compra_produto(
    id_compra INT NOT NULL REFERENCES tb_compra(id_compra),
    id_produto INT NOT NULL REFERENCES tb_produto(id_produto),
    quantidade INT NOT NULL,
    PRIMARY KEY(id_compra, id_produto)
);