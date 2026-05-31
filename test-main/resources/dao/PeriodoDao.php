<?php
    require_once '../dao/Conexao.php';
    
    class PeriodoDao{
        public static function insert($periodo){
            $conexao = Conexao::conectar();
            $query = "INSERT INTO periodo (nome) VALUES (?)";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $periodo->getNome());

            $stmt->execute();
        }

        public static function selectAll(){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM periodo ORDER BY nome";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
            }
                    
        public static function selectById($id){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM periodo WHERE id_periodo = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
            }


        public static function delete($id){
            $conexao = Conexao::conectar();
            $query = "DELETE FROM periodo WHERE id_periodo = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $id);
            return  $stmt->execute();
            }

        public static function update($periodo){
            $conexao = Conexao::conectar();
            $query = "UPDATE periodo SET 
            nome = ?
            WHERE id_periodo = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $periodo->getNome());
            $stmt->bindValue(2, $periodo->getId());
            return $stmt->execute();
        }

        public static function selectDashboard(
            $inicio,
            $limite,
            $busca = '',
            $ordenarPor = 'id_periodo',
            $ordem = 'DESC'
        ) {

            $conexao = Conexao::conectar();

            $colunasPermitidas = [
                'id_periodo',
                'nome'
            ];

            if (!in_array($ordenarPor, $colunasPermitidas)) {
                $ordenarPor = 'id_periodo';
            }

            $ordem = strtoupper($ordem) === 'ASC' ? 'ASC' : 'DESC';

            $query = "
                SELECT *
                FROM periodo

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
                FROM periodo

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