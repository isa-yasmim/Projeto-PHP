CREATE TABLE tb_usuario(
id_usuario INT NOT NULL AUTO_INCREMENT,
nome VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL,
senha VARCHAR(255) NOT NULL,
nascimento DATE NOT NULL,
adm INT NOT NULL,
PRIMARY KEY(id_usuario)
);