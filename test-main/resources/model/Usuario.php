<?php

    class Usuario{
        public $idUsuario, $nomeUsuario, $cpfUsuario, $emailUsuario, $senhaUsuario, $telefoneUsuario, $enderecoUsuario, $cargoUsuario, $nivelAcessoUsuario, $imagemUsuario, $statusUsuario;

            public function getId(){
                return $this->idUsuario;
            }
            public function setId($id){
                $this->idUsuario = $id;
            }

            public function getNome(){
            return $this->nomeUsuario;
            }
            public function setNome($nome){
                $this->nomeUsuario = $nome;
            }
            public function getCpf(){
            return $this->cpfUsuario;
            }
            public function setCpf($cpf){
                $this->cpfUsuario= $cpf;
            }
            public function getEmail(){
                return $this->emailUsuario;
            }
            public function setEmail($email){
                $this->emailUsuario = $email;
            }

            public function getSenha(){
            return $this->senhaUsuario;
            }
            public function setSenha($senha){
                $this->senhaUsuario = $senha;
            }
            public function getTelefone(){
                return $this->telefoneUsuario;
            }
            public function setTelefone($telefone){
                $this->telefoneUsuario = $telefone;
            }
            public function getEndereco(){
                return $this->enderecoUsuario;
            }
            public function setEndereco($endereco){
                $this->enderecoUsuario = $endereco;
            }

            public function getCargo(){
                return $this->cargoUsuario;
            }
            public function setCargo($cargo){
                $this->cargoUsuario = $cargo;
            }

            public function getNivelAcesso(){
                return $this->nivelAcessoUsuario;
            }
            public function setNivelAcesso($nivelAcesso){
                $this->nivelAcessoUsuario = $nivelAcesso;
            }
            public function getFoto(){
                return $this->imagemUsuario;
            }
            public function setFoto($foto){
                $this->imagemUsuario = $foto;
            }

            public function getStatus(){
                return $this->statusUsuario;
            }
            public function setStatus($status){
                $this->statusUsuario = $status;
            }

            

        
        public function salvarImagem($novo_nome) {
            //a foto vem com a extenção $_FILES
            if(empty($_FILES['foto']['size']) != 1){
                //pegar as extensão do arquivo
                if ($novo_nome ==""){
                    //Ciando um nome novo
                    $novo_nome = md5(time()). ".jpg";
                }
                //definindo o diretorio
                $diretorio = "../img/Usuario/";
                //juntando o nome com o diretorio
                $nomeCompleto = $diretorio.$novo_nome;
                //efetuando o upload
                    move_uploaded_file($_FILES['foto']['tmp_name'], $nomeCompleto );
                return $novo_nome;
                }else{
                    return $novo_nome;
             }
          }




    }
?>