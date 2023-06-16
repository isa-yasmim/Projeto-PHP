<?php
    //DAO Data Acess Objetct

    class categoriaDAO{
        
        private $pdo;
        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        /*Obter todas as pessoas da tabela*/

        public function getAll(){
            $stmt = $this->pdo->prepare("SELECT * FROM tb_categoria");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);

        }

        public function insert($categoria)
        {

            $stmt = $this->pdo->prepare("INSERT INTO tb_categoria(nome) VALUES (?)");

            $stmt->bindParam(1, $categoria->nome);

            $stmt->execute();
            $categoria = clone $categoria;
            $categoria->id = $this->pdo->lastInsertId();

            return $categoria;
        }

        public function delete($id, $categoria)
        {
            $stmt = $this->pdo->prepare("DELETE FROM tb_categoria WHERE id_categoria = :id");
            $stmt->bindValue(":id", $id);
            $stmt->execute();

            return $stmt->rowCount();
        }

        public function update($id, $categoria)
        {
            $stmt = $this ->pdo->prepare("UPDATE tb_categoria SET nome = :nome WHERE id_categoria = :id");
            $data = [
                ":id" => $id,
                ":nome" => $categoria->nome
            ];
            return $stmt->execute($data);
        }
    }

?>