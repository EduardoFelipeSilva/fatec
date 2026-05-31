<?php

    class Marca{
        public $idMarca, $nomeMarca;

            public function getId(){
                return $this->idMarca;
            }
            public function setId($id){
                $this->idMarca = $id;
            }

            public function getNome(){
            return $this->nomeMarca;
            }
            public function setNome($nome){
                $this->nomeMarca = $nome;
            }


    }
?>