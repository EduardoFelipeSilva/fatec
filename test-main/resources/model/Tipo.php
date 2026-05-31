<?php

    class Tipo{
        public $idTipo, $nomeTipo;

            public function getId(){
                return $this->idTipo;
            }
            public function setId($id){
                $this->idTipo = $id;
            }

            public function getNome(){
            return $this->nomeTipo;
            }
            public function setNome($nome){
                $this->nomeTipo = $nome;
            }

    }
?>