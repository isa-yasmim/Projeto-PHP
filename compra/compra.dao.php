<?php
    //DAO Data Acess Objetct

    class compraDAO{
        
        private $pdo;
        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        /*Obter todas as pessoas da tabela*/

        public function getAll(){
            $stmt = $this->pdo->prepare("SELECT * FROM tb_compra");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);

        }

        public function insert($compra)
        {

            $stmt = $this->pdo->prepare("INSERT INTO tb_compra(id_usuario, valor, data) VALUES (?, ?, ?)");

            $stmt->bindParam(1, $compra->id_usuario);
            $stmt->bindParam(2, $compra->valor);
            $stmt->bindParam(3, $compra->data);

            $stmt->execute();
            $compra = clone $compra;
            $compra->id = $this->pdo->lastInsertId();

            foreach($compra->itens as $item) {
                $stmt = $this->pdo->prepare("INSERT INTO tb_compra_produto(id_compra, id_produto, quantidade) VALUES (?, ?, ?)");
                $stmt->bindParam(1, $compra->id);
                $stmt->bindParam(2, $item->id_produto);
                $stmt->bindParam(3, $item->quantidade);
            }

            return $compra;
        }

        public function delete($id, $compra)
        {
            $stmt = $this->pdo->prepare("DELETE FROM tb_compra WHERE id_compra = :id");
            $stmt->bindValue(":id", $id);
            $stmt->execute();

            return $stmt->rowCount();
        }

        public function update($id, $compra)
        {
            $stmt = $this ->pdo->prepare("UPDATE tb_compra SET id_usuario = :id_usuario, valor = :valor, data = :data WHERE id_compra = :id");
            $data = [
                ":id" => $id,
                ":id_usuario" => $compra->id_usuario,
                ":valor" => $compra->valor,
                ":data" => $compra->data
            ];
            return $stmt->execute($data);
        }
    }