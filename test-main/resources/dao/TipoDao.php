<?php
    require_once '../dao/Conexao.php';
    
    class TipoDao{
        public static function insert($tipo){
            $conexao = Conexao::conectar();
            $query = "INSERT INTO tipo (nome) VALUES (?)";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $tipo->getNome());
            $stmt->execute();
        }

        public static function selectAll(){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tipo ORDER BY nome";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
            }
                    
        public static function selectById($id){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM tipo WHERE id_Tipo = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
            }


        public static function delete($id){
            $conexao = Conexao::conectar();
            $query = "DELETE FROM tipo WHERE id_Tipo = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $id);
            return  $stmt->execute();
            }

        public static function update($Tipo ){
            $conexao = Conexao::conectar();
            $query = "UPDATE tipo SET 
            nome = ? 
            WHERE id_Tipo = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $Tipo->getNome());
            $stmt->bindValue(2, $Tipo->getId());
            return $stmt->execute();
        }

        public static function totalDashboard($busca = '')
        {
            $conexao = Conexao::conectar();

            $query = "
                SELECT COUNT(*) AS total
                FROM tipo

                WHERE nome LIKE ?
            ";

            $stmt = $conexao->prepare($query);

            $stmt->bindValue(1, "%{$busca}%");

            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            return $resultado['total'];
        }

        public static function selectDashboard(
            $inicio,
            $limite,
            $busca = '',
            $ordenarPor = 'id_tipo',
            $ordem = 'DESC'
        ) {

            $conexao = Conexao::conectar();

            $colunasPermitidas = [
                'id_tipo',
                'nome'
            ];

            if (!in_array($ordenarPor, $colunasPermitidas)) {
                $ordenarPor = 'id_tipo';
            }

            $ordem = strtoupper($ordem) === 'ASC' ? 'ASC' : 'DESC';

            $query = "
                SELECT *
                FROM tipo

                WHERE nome LIKE ?

                ORDER BY $ordenarPor $ordem

                LIMIT ?, ?
            ";

            $stmt = $conexao->prepare($query);

            $stmt->bindValue(1, "%{$busca}%");
            $stmt->bindValue(2, (int)$inicio, PDO::PARAM_INT);
            $stmt->bindValue(3, (int)$limite, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>