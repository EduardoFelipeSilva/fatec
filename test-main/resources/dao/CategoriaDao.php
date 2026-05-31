<?php
    require_once '../dao/Conexao.php';
    
    class CategoriaDao{
        public static function insert($categoria){
            $conexao = Conexao::conectar();
            $query = "INSERT INTO categoria (nome) VALUES (?)";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $categoria->getNome());
            $stmt->execute();
        }

        public static function selectAll()
        {
            $conexao = Conexao::conectar();

            $query = "SELECT * FROM categoria ORDER BY nome";

            $stmt = $conexao->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }
                    
        public static function selectById($id){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM categoria WHERE id_Categoria = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
            }


        public static function delete($id){
            $conexao = Conexao::conectar();
            $query = "DELETE FROM categoria WHERE id_Categoria = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $id);
            return  $stmt->execute();
            }

        public static function update($Categoria ){
            $conexao = Conexao::conectar();
            $query = "UPDATE categoria SET 
            nome = ?
            WHERE id_Categoria = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $Categoria->getNome());
            $stmt->bindValue(2, $Categoria->getId());
            return $stmt->execute();
        }

        public static function totalDashboard($busca = '')
{
    $conexao = Conexao::conectar();

    $query = "
        SELECT COUNT(*) as total
        FROM categoria
        WHERE nome LIKE ?
    ";

    $stmt = $conexao->prepare($query);

    $stmt->bindValue(1, "%$busca%");

    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    return $resultado['total'];
}

        public static function selectDashboard($inicio, $limite, $busca = '', $ordenarPor = 'id_categoria', $ordem = 'DESC')
            {
                $conexao = Conexao::conectar();

                $query = "
                    SELECT *
                    FROM categoria
                    WHERE nome LIKE ?
                    ORDER BY $ordenarPor $ordem
                    LIMIT ?, ?
                ";

                $stmt = $conexao->prepare($query);

                $stmt->bindValue(1, "%$busca%");
                $stmt->bindValue(2, (int)$inicio, PDO::PARAM_INT);
                $stmt->bindValue(3, (int)$limite, PDO::PARAM_INT);

                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

    }

    
?>