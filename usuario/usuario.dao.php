<?php
    //DAO Data Acess Objetct

    class usuarioDAO{
        
        private $pdo;
        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        /*Obter todas as pessoas da tabela*/

        public function getAll(){
            $stmt = $this->pdo->prepare("SELECT * FROM tb_usuario");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);

        }

        public function insert($usuario)
        {

            $stmt = $this->pdo->prepare("INSERT INTO tb_usuario(nome, email, senha, nascimento, adm) VALUES (?, ?, ?, ?, ?)");

            $stmt->bindParam(1, $usuario->nome);
            $stmt->bindParam(2, $usuario->email);
            $stmt->bindParam(3, $usuario->senha);
            $stmt->bindParam(4, $usuario->nascimento);
            $stmt->bindParam(5, $usuario->adm);

            $stmt->execute();
            $usuario = clone $usuario;
            $usuario->id = $this->pdo->lastInsertId();

            return $usuario;
        }

        public function delete($id, $usuario)
        {
            $stmt = $this->pdo->prepare("DELETE FROM tb_usuario WHERE id_usuario = :id");
            $stmt->bindValue(":id", $id);
            $stmt->execute();

            return $stmt->rowCount();
        }

        public function update($id, $usuario)
        {
            $stmt = $this ->pdo->prepare("UPDATE tb_usuario SET nome = :nome, email = :email, senha = :senha, nascimento = :nascimento, adm = :adm WHERE id_usuario = :id");
            $data = [
                ":id" => $id,
                ":nome" => $usuario->nome,
                ":email" => $usuario->email,
                ":senha" => $usuario->senha,
                ":nascimento" => $usuario->nascimento,
                ":adm" => $usuario->adm
            ];
            return $stmt->execute($data);
        }
    }

?>