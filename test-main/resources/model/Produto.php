<?php

    class Produto{
        public $idProduto, $nomeProduto, $precoProduto, $custoProduto, $lucroProduto, $descricaoProduto, $idCategoria, $idTipo, $idMarca, $statusProduto;

            public function getId(){
                return $this->idProduto;
            }
            public function setId($id){
                $this->idProduto = $id;
            }

            public function getNome(){
            return $this->nomeProduto;
            }
            public function setNome($nome){
                $this->nomeProduto = $nome;
            }

            public function getPreco(){
                return $this->precoProduto;
            }
            public function setPreco($preco){
                $this->precoProduto = $preco;
            }

            public function getCusto(){
                return $this->custoProduto;
            }
            public function setCusto($custo){
                $this->custoProduto = $custo;
            }

            public function getLucro(){
                return $this->lucroProduto;
            }
            public function setLucro($lucro){
                $this->lucroProduto = $lucro;
            }

            public function getDescricao(){
                return $this->descricaoProduto;
            }
            public function setDescricao($descricao){
                $this->descricaoProduto = $descricao;
            }

            public function getIdCategoria(){
                return $this->idCategoria;
            }
            public function setIdCategoria($idCategoria){
                $this->idCategoria = $idCategoria;
            }

            public function getIdTipo(){
                return $this->idTipo;
            }
            public function setIdTipo($idTipo){
                $this->idTipo = $idTipo;
            }

            public function getIdMarca(){
                return $this->idMarca;
            }
            public function setIdMarca($idMarca){
                $this->idMarca = $idMarca;
            }
    
            public function getIdStatus(){
                return $this->statusProduto;
            }
            public function setIdStatus($idStatus){
                $this->statusProduto = $idStatus;
            }

    }
?>