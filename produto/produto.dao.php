<?php
    //DAO Data Acess Objetct

    class produtoDAO{
        
        private $pdo;
        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        /*Obter todas as pessoas da tabela*/

        public function getAll(){
            $stmt = $this->pdo->prepare("SELECT * FROM tb_produto");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);

        }

        public function insert($produto)
        {

            $stmt = $this->pdo->prepare("INSERT INTO tb_produto(nome, descricao, id_categoria, preco, quantidade) VALUES (?, ?, ?, ?, ?)");

            $stmt->bindParam(1, $produto->nome);
            $stmt->bindParam(2, $produto->descricao);
            $stmt->bindParam(3, $produto->id_categoria);
            $stmt->bindParam(4, $produto->preco);
            $stmt->bindParam(5, $produto->quantidade);

            $stmt->execute();
            $produto = clone $produto;
            $produto->id = $this->pdo->lastInsertId();

            return $produto;
        }

        public function delete($id, $produto)
        {
            $stmt = $this->pdo->prepare("DELETE FROM tb_produto WHERE id_produto = :id");
            $stmt->bindValue(":id", $id);
            $stmt->execute();

            return $stmt->rowCount();
        }

        public function update($id, $produto)
        {
            $stmt = $this ->pdo->prepare("UPDATE tb_produto SET nome = :nome, descricao = :descricao, id_categoria = :id_categoria, preco = :preco, quantidade = :quantidade WHERE id_produto = :id");
            $data = [
                ":id" => $id,
                ":nome" => $produto->nome,
                ":descricao" => $produto->descricao,
                ":id_categoria" => $produto->id_categoria,
                ":preco" => $produto->preco,
                ":quantidade" => $produto->quantidade

            ];
            return $stmt->execute($data);
        }
    }