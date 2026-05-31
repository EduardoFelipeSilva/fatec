<?php

require_once '../dao/Conexao.php';

class VendaDao {

    public static function insert($venda) {
        $conexao = Conexao::conectar();

        $query = "INSERT INTO venda 
        (id_estoque, id_produto, id_armazenamento, id_periodo, quantidade, data_venda)
        VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(1, $venda['id_estoque']);
        $stmt->bindValue(2, $venda['id_produto']);
        $stmt->bindValue(3, $venda['id_armazenamento']);
        $stmt->bindValue(4, $venda['id_periodo']);
        $stmt->bindValue(5, $venda['quantidade']);
        $stmt->bindValue(6, $venda['data_venda']);

        return $stmt->execute();

        
    }

        public static function selectDashboard($inicio, $limite, $buscaVenda, $ordenarPor, $ordem) {
        $conexao = Conexao::conectar();

        $colunasPermitidas = [
            'id_venda',
            'produto',
            'armazenamento',
            'periodo',
            'quantidade',
            'data_venda'
        ];

        if (!in_array($ordenarPor, $colunasPermitidas)) {
            $ordenarPor = 'id_venda';
        }

        $ordem = strtoupper($ordem) === 'ASC' ? 'ASC' : 'DESC';

        $query = "
            SELECT 
                v.id_venda,
                v.quantidade,
                v.data_venda,
                p.nome AS produto,
                a.nome AS armazenamento,
                pe.nome AS periodo
            FROM venda v
            LEFT JOIN produto p ON v.id_produto = p.id_produto
            LEFT JOIN armazenamento a ON v.id_armazenamento = a.id_armazenamento
            LEFT JOIN periodo pe ON v.id_periodo = pe.id_periodo
            WHERE 
                p.nome LIKE ? 
                OR a.nome LIKE ?
                OR pe.nome LIKE ?
                OR v.data_venda LIKE ?
            ORDER BY $ordenarPor $ordem
            LIMIT ?, ?
        ";

        $stmt = $conexao->prepare($query);
        $busca = "%$buscaVenda%";

        $stmt->bindValue(1, $busca);
        $stmt->bindValue(2, $busca);
        $stmt->bindValue(3, $busca);
        $stmt->bindValue(4, $busca);
        $stmt->bindValue(5, $inicio, PDO::PARAM_INT);
        $stmt->bindValue(6, $limite, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function totalDashboard($buscaVenda) {
        $conexao = Conexao::conectar();

        $query = "
            SELECT COUNT(*) AS total
            FROM venda v
            LEFT JOIN produto p ON v.id_produto = p.id_produto
            LEFT JOIN armazenamento a ON v.id_armazenamento = a.id_armazenamento
            LEFT JOIN periodo pe ON v.id_periodo = pe.id_periodo
            WHERE 
                p.nome LIKE ? 
                OR a.nome LIKE ?
                OR pe.nome LIKE ?
                OR v.data_venda LIKE ?
        ";

        $stmt = $conexao->prepare($query);
        $busca = "%$buscaVenda%";

        $stmt->bindValue(1, $busca);
        $stmt->bindValue(2, $busca);
        $stmt->bindValue(3, $busca);
        $stmt->bindValue(4, $busca);

        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado['total'];
    }

    public static function totalVendas() {
        $conexao = Conexao::conectar();

        $query = "SELECT COUNT(*) AS total FROM venda";
        $stmt = $conexao->prepare($query);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado['total'];
    }

    public static function totalVendidoHoje() {
        $conexao = Conexao::conectar();

        $query = "SELECT COALESCE(SUM(quantidade), 0) AS total FROM venda WHERE data_venda = CURDATE()";
        $stmt = $conexao->prepare($query);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado['total'];
    }

    public static function totalQuantidadeVendida() {
        $conexao = Conexao::conectar();

        $query = "SELECT COALESCE(SUM(quantidade), 0) AS total FROM venda";
        $stmt = $conexao->prepare($query);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado['total'];
    }
}
