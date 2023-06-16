CREATE TABLE tb_compra(
id_compra INT NOT NULL AUTO_INCREMENT,
id_usuario INT NOT NULL REFERENCES tb_usuario(id_usuario),
valor FLOAT NOT NULL,
data DATE NOT NULL,
PRIMARY KEY(id_compra)
);