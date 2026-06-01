<?php
    require_once '../dao/Conexao.php';
    
    class UsuarioDao{
        // public static function insert($usuario){
        //     $conexao = Conexao::conectar();
        //     $query = "INSERT INTO users (nome, cpf, email, senha, telefone, endereco, cargo, nivel_acesso, foto, id_status) VALUES (?,?,?,?,?,?,?,?,?,?)";
        //     $stmt = $conexao->prepare($query);
        //     $stmt->bindValue(1, $usuario->getNome());
        //     $stmt->bindValue(2, $usuario->getCpf());
        //     $stmt->bindValue(3, $usuario->getEmail());
        //     $stmt->bindValue(4, $usuario->getSenha());
        //     $stmt->bindValue(5, $usuario->getTelefone());
        //     $stmt->bindValue(6, $usuario->getEndereco());
        //     $stmt->bindValue(7, $usuario->getCargo());
        //     $stmt->bindValue(8, $usuario->getNivelAcesso());
        //     $stmt->bindValue(9, $usuario->getFoto());
        //     $stmt->bindValue(10, $usuario->getStatus());
        //     $stmt->execute();
        // }

        // public static function selectAll(){
        //     $conexao = Conexao::conectar();
        //     $query = "SELECT * FROM users ORDER BY nome";
        //     $stmt = $conexao->prepare($query);
        //     $stmt->execute();
        //     return $stmt->fetchAll();
        //     }
                    
        // public static function selectById($id){
        //     $conexao = Conexao::conectar();
        //     $query = "SELECT * FROM users WHERE id_user = ?";
        //     $stmt = $conexao->prepare($query);
        //     $stmt->bindValue(1, $id);
        //     $stmt->execute();
        //     return $stmt->fetch(PDO::FETCH_ASSOC);
        //     }


        // public static function delete($id){
        //     $conexao = Conexao::conectar();
        //     $query = "DELETE FROM users WHERE id_user = ?";
        //     $stmt = $conexao->prepare($query);
        //     $stmt->bindValue(1, $id);
        //     return  $stmt->execute();
        //     }

        // public static function update($User ){
        //     $conexao = Conexao::conectar();
        //     $query = "UPDATE users SET 
        //     nome = ?, 
        //     cpf  = ?,
        //     email = ?, 
        //     endereco = ?, 
        //     senha = ?, 
        //     telefone = ?, 
        //     cargo = ?, 
        //     nivel_acesso = ?, 
        //     foto = ?
        //     WHERE id_user = ?";
        //     $stmt = $conexao->prepare($query);
        //     $stmt->bindValue(1, $User->getNome());
        //     $stmt->bindValue(2, $User->getCpf());
        //     $stmt->bindValue(3, $User->getEmail());
        //     $stmt->bindValue(4, $User->getEndereco());
        //     $stmt->bindValue(5, $User->getSenha());
        //     $stmt->bindValue(6, $User->getTelefone());
        //     $stmt->bindValue(7, $User->getCargo());
        //     $stmt->bindValue(8, $User->getNivelAcesso());
        //     $stmt->bindValue(9, $User->getFoto());
        //     $stmt->bindValue(10, $User->getId());
        //     return $stmt->execute();
        // }

        // public static function updatePerfil($usuario){
        //     $conexao = Conexao::conectar();
        //     $query = "UPDATE users SET 
        //     nome = ?, 
        //     email = ?, 
        //     telefone = ?,
        //     foto = ?
        //     WHERE id_user = ?";
        //     $stmt = $conexao->prepare($query);
        //     $stmt->bindValue(1, $usuario->getNome());
        //     $stmt->bindValue(2, $usuario->getEmail());
        //     $stmt->bindValue(3, $usuario->getTelefone());
        //     $stmt->bindValue(4, $usuario->getFoto());
        //     $stmt->bindValue(5, $usuario->getId());
        //     return $stmt->execute();
        // }
        public static function login($email, $senha)
        {
            $conexao = Conexao::conectar();

            $query = "SELECT * FROM users WHERE email = ? AND senha = ? LIMIT 1";

            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $senha);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        // public static function emailExiste($email){
        //     $conexao = Conexao::conectar();

        //     $sql = "SELECT id_user FROM users WHERE email = :email LIMIT 1";

        //     $stmt = $conexao->prepare($sql);
        //     $stmt->bindValue(':email', $email);
        //     $stmt->execute();

        //     return $stmt->rowCount() > 0;
        // }
    }
?>