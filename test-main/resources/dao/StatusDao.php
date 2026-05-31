<?php
    require_once '../dao/Conexao.php';
    
    class StatusDao{
        public static function insert($status){
            $conexao = Conexao::conectar();
            $query = "INSERT INTO status (nome) VALUES (?)";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $status->getNome());
            $stmt->execute();
        }

        public static function selectAll(){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM status ORDER BY nome";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
            }
                    
        public static function selectById($id){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM status WHERE idStatus = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
            }


        public static function delete($id){
            $conexao = Conexao::conectar();
            $query = "DELETE FROM status WHERE idStatus = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $id);
            return  $stmt->execute();
            }

        public static function update($Status ){
            $conexao = Conexao::conectar();
            $query = "UPDATE status SET 
            nome = ?, 
            WHERE idStatus = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $Status->getNome());
            $stmt->bindValue(2, $Status->getId());
            return $stmt->execute();
        }

    }
?>