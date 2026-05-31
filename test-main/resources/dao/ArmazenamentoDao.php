<?php
    require_once '../dao/Conexao.php';
    
    class ArmazenamentoDao{
        public static function insert($armazenamento){
            $conexao = Conexao::conectar();
            $query = "INSERT INTO armazenamento (nome, local, capacidade, id_status) VALUES (?,?,?,?)";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $armazenamento->getNome());
            $stmt->bindValue(2, $armazenamento->getLocal());
            $stmt->bindValue(3, $armazenamento->getCapacidade());
            $stmt->bindValue(4, $armazenamento->getStatus());
            $stmt->execute();
        }

        public static function selectAll(){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM armazenamento ORDER BY nome";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
            }
                    
        public static function selectById($id){
            $conexao = Conexao::conectar();
            $query = "SELECT * FROM armazenamento WHERE id_Armazenamento = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
            }


        public static function delete($id){
            $conexao = Conexao::conectar();
            $query = "DELETE FROM armazenamento WHERE id_Armazenamento = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $id);
            return  $stmt->execute();
            }

        public static function update($Armazenamento ){
            $conexao = Conexao::conectar();
            $query = "UPDATE armazenamento SET 
            nome = ?, 
            local = ?, 
            capacidade = ?, 
            id_status = ?
            WHERE id_Armazenamento = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(1, $Armazenamento->getNome());
            $stmt->bindValue(2, $Armazenamento->getLocal());
            $stmt->bindValue(3, $Armazenamento->getCapacidade());
            $stmt->bindValue(4, $Armazenamento->getStatus());
            $stmt->bindValue(5, $Armazenamento->getId()); 
            return $stmt->execute();
        }

        public static function selectDashboard(
    $inicio,
    $limite,
    $busca = '',
    $ordenarPor = 'id_local_armazenamento',
    $ordem = 'DESC'
){
    $conexao = Conexao::conectar();

    $colunasPermitidas = [
        'id_armazenamento',
        'nome',
        'local',
        'capacidade'
    ];

    if(!in_array($ordenarPor, $colunasPermitidas)){
        $ordenarPor = 'id_armazenamento';
    }

    $ordem = strtoupper($ordem) === 'ASC' ? 'ASC' : 'DESC';

    $query = "
        SELECT
            la.*,
            s.nome AS status

        FROM armazenamento la

        LEFT JOIN status s
            ON la.id_status = s.id_status

        WHERE
            la.nome LIKE ?
            OR la.local LIKE ?

        ORDER BY $ordenarPor $ordem

        LIMIT ?, ?
    ";

    $stmt = $conexao->prepare($query);

    $stmt->bindValue(1, "%{$busca}%");
    $stmt->bindValue(2, "%{$busca}%");
    $stmt->bindValue(3, (int)$inicio, PDO::PARAM_INT);
    $stmt->bindValue(4, (int)$limite, PDO::PARAM_INT);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public static function totalDashboard($busca = '')
{
    $conexao = Conexao::conectar();

    $query = "
        SELECT COUNT(*) AS total

        FROM armazenamento

        WHERE
            nome LIKE ?
            OR local LIKE ?
    ";

    $stmt = $conexao->prepare($query);

    $stmt->bindValue(1, "%{$busca}%");
    $stmt->bindValue(2, "%{$busca}%");

    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    return $resultado['total'];
}
    }
?>