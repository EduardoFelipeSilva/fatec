<?php
    require_once '../dao/Conexao.php';
    
    class MarcaDao{
        public static function insert($marca){
            $conexao = Conexao::conectar();
            $query = "INSERT INTO marca (nome) VALUES (?)";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $marca->getNome());

            $stmt->execute();
        }

        public static function selectAll(){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM marca ORDER BY nome";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
            }
                    
        public static function selectById($id){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM marca WHERE id_Marca = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
            }


        public static function delete($id){
            $conexao = Conexao::conectar();
            $query = "DELETE FROM marca WHERE id_Marca = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $id);
            return  $stmt->execute();
            }

        public static function update($Marca ){
            $conexao = Conexao::conectar();
            $query = "UPDATE marca SET 
            nome = ?
            WHERE id_Marca = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $Marca->getNome());
            $stmt->bindValue(2, $Marca->getId());
            return $stmt->execute();
        }

        public static function selectDashboard(
            $inicio,
            $limite,
            $busca = '',
            $ordenarPor = 'id_marca',
            $ordem = 'DESC'
        ) {

            $conexao = Conexao::conectar();

            $colunasPermitidas = [
                'id_marca',
                'nome'
            ];

            if (!in_array($ordenarPor, $colunasPermitidas)) {
                $ordenarPor = 'id_marca';
            }

            $ordem = strtoupper($ordem) === 'ASC' ? 'ASC' : 'DESC';

            $query = "
                SELECT *
                FROM marca

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

        public static function totalDashboard($busca = '')
        {
            $conexao = Conexao::conectar();

            $query = "
                SELECT COUNT(*) AS total
                FROM marca

                WHERE nome LIKE ?
            ";

            $stmt = $conexao->prepare($query);

            $stmt->bindValue(1, "%{$busca}%");

            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            return $resultado['total'];
        }

    }
?>