<?php

require_once '../dao/Conexao.php';

class EstoqueDao {

    public static function insert($estoque) {
        $conexao = Conexao::conectar();

        $query = "
            INSERT INTO estoque 
            (
                id_produto,
                id_armazenamento,
                quantidade,
                id_status
            ) 
            VALUES (?, ?, ?, ?)
        ";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(1, $estoque->getIdProduto());
        $stmt->bindValue(2, $estoque->getIdArmazenamento());
        $stmt->bindValue(3, $estoque->getQuantidade());
        $stmt->bindValue(4, $estoque->getStatus());

        return $stmt->execute();
    }

    public static function buscarProdutoArmazenamento($idProduto, $idArmazenamento) {
        $conexao = Conexao::conectar();

        $query = "
            SELECT *
            FROM estoque
            WHERE id_produto = ?
            AND id_armazenamento = ?
            LIMIT 1
        ";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(1, $idProduto);
        $stmt->bindValue(2, $idArmazenamento);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function selectAll() {
        $conexao = Conexao::conectar();

        $query = "
            SELECT *
            FROM estoque
            ORDER BY id_estoque DESC
        ";

        $stmt = $conexao->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function selectById($id) {
        $conexao = Conexao::conectar();

        $query = "
            SELECT *
            FROM estoque
            WHERE id_estoque = ?
        ";

        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function delete($id) {
        $conexao = Conexao::conectar();

        $query = "
            DELETE FROM estoque
            WHERE id_estoque = ?
        ";

        $stmt = $conexao->prepare($query);
        $stmt->bindValue(1, $id);

        return $stmt->execute();
    }

    public static function update($estoque) {
        $conexao = Conexao::conectar();

        $query = "
            UPDATE estoque SET 
                id_produto = ?,
                id_armazenamento = ?,
                quantidade = ?,
                id_status = ?
            WHERE id_estoque = ?
        ";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(1, $estoque->getIdProduto());
        $stmt->bindValue(2, $estoque->getIdArmazenamento());
        $stmt->bindValue(3, $estoque->getQuantidade());
        $stmt->bindValue(4, $estoque->getStatus());
        $stmt->bindValue(5, $estoque->getId());

        return $stmt->execute();
    }

    public static function selectDashboard($inicio, $limite, $buscaEstoque, $ordenarPor, $ordem) {
        $conexao = Conexao::conectar();

        $colunasPermitidas = [
            'id_estoque',
            'produto_nome',
            'armazenamento_nome',
            'quantidade',
            'id_status'
        ];

        if (!in_array($ordenarPor, $colunasPermitidas)) {
            $ordenarPor = 'id_estoque';
        }

        $ordem = strtoupper($ordem) === 'ASC' ? 'ASC' : 'DESC';

        $orderBy = match ($ordenarPor) {
            'produto_nome' => 'p.nome',
            'armazenamento_nome' => 'a.nome',
            default => 'e.' . $ordenarPor
        };

        $query = "
            SELECT
                e.id_estoque,
                e.id_produto,
                e.id_armazenamento,
                e.quantidade,
                e.id_status,
                p.nome AS produto_nome,
                a.nome AS armazenamento_nome
            FROM estoque e
            LEFT JOIN produto p 
                ON p.id_produto = e.id_produto
            LEFT JOIN armazenamento a
                ON a.id_armazenamento = e.id_armazenamento
            WHERE
                p.nome LIKE ?
                OR a.nome LIKE ?
                OR e.quantidade LIKE ?
                OR e.id_status LIKE ?
            ORDER BY $orderBy $ordem
            LIMIT ?, ?
        ";

        $stmt = $conexao->prepare($query);

        $busca = "%" . $buscaEstoque . "%";

        $stmt->bindValue(1, $busca);
        $stmt->bindValue(2, $busca);
        $stmt->bindValue(3, $busca);
        $stmt->bindValue(4, $busca);
        $stmt->bindValue(5, (int)$inicio, PDO::PARAM_INT);
        $stmt->bindValue(6, (int)$limite, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function totalDashboard($buscaEstoque) {
        $conexao = Conexao::conectar();

        $query = "
            SELECT COUNT(*) as total
            FROM estoque e
            LEFT JOIN produto p 
                ON p.id_produto = e.id_produto
            LEFT JOIN armazenamento a
                ON a.id_armazenamento = e.id_armazenamento
            WHERE
                p.nome LIKE ?
                OR a.nome LIKE ?
                OR e.quantidade LIKE ?
                OR e.id_status LIKE ?
        ";

        $stmt = $conexao->prepare($query);

        $busca = "%" . $buscaEstoque . "%";

        $stmt->bindValue(1, $busca);
        $stmt->bindValue(2, $busca);
        $stmt->bindValue(3, $busca);
        $stmt->bindValue(4, $busca);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public static function alterarQuantidade($id, $quantidade) {
        $conexao = Conexao::conectar();

        $query = "
            UPDATE estoque
            SET quantidade = ?
            WHERE id_estoque = ?
        ";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(1, $quantidade);
        $stmt->bindValue(2, $id);

        return $stmt->execute();
    }
}

?>