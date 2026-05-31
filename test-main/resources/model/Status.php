<?php

    class Status{
        public $idStatus, $nomeStatus, $statusStatus;

            public function getId(){
                return $this->idStatus;
            }
            public function setId($id){
                $this->idStatus = $id;
            }

            public function getNome(){
            return $this->nomeStatus;
            }
            public function setNome($nome){
                $this->nomeStatus = $nome;
            }

    }
?>