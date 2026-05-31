<?php

    class Estoque{
        public $idEstoque, $idProduto, $idArmazenamento, $quantidadeEstoque, $statusEstoque;

            public function getId(){
                return $this->idEstoque;
            }
            public function setId($id){
                $this->idEstoque = $id;
            }

            public function getIdProduto(){
                return $this->idProduto;
            }
            public function setIdProduto($idProduto){
                $this->idProduto = $idProduto;
            }

            public function getIdArmazenamento(){
            return $this->idArmazenamento;
            }
            public function setIdArmazenamento($idArmazenamento){
                $this->idArmazenamento = $idArmazenamento;
            }

            public function getQuantidade(){
                return $this->quantidadeEstoque;
            }
            public function setQuantidade($quantidade){
                $this->quantidadeEstoque = $quantidade;
            }
            public function getStatus(){
                return $this->statusEstoque;
            }
            public function setStatus($status){
                $this->statusEstoque = $status;
            }

    }
?>