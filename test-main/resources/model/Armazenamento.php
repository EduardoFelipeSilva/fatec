<?php

    class Armazenamento{
        public $idArmazenamento, $nomeArmazenamento, $localArmazenamento, $capacidadeArmazenamento, $statusArmazenamento;

            public function getId(){
                return $this->idArmazenamento;
            }
            public function setId($id){
                $this->idArmazenamento = $id;
            }

            public function getNome(){
            return $this->nomeArmazenamento;
            }
            public function setNome($nome){
                $this->nomeArmazenamento = $nome;
            }
            public function getLocal(){
            return $this->localArmazenamento;
            }
            public function setLocal($local){
                $this->localArmazenamento = $local;
            }
            public function getCapacidade(){
            return $this->capacidadeArmazenamento;
            }
            public function setCapacidade($capacidade){
                $this->capacidadeArmazenamento = $capacidade;
            }

            public function getStatus(){
                return $this->statusArmazenamento;
            }
            public function setStatus($status){
                $this->statusArmazenamento = $status;
            }

    }
?>