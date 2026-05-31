<?php

    class Categoria{
        public $idCategoria, $nomeCategoria;

            public function getId(){
                return $this->idCategoria;
            }
            public function setId($id){
                $this->idCategoria = $id;
            }

            public function getNome(){
            return $this->nomeCategoria;
            }
            public function setNome($nome){
                $this->nomeCategoria = $nome;
            }

    }
?>