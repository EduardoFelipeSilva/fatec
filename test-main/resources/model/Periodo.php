<?php

    class Periodo{
        public $idPeriodo, $nomePeriodo;

            public function getId(){
                return $this->idPeriodo;
            }
            public function setId($id){
                $this->idPeriodo = $id;
            }

            public function getNome(){
            return $this->nomePeriodo;
            }
            public function setNome($nome){
                $this->nomePeriodo = $nome;
            }

    }
?>