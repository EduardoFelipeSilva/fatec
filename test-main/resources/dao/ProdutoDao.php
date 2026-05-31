<?php
require_once '../dao/Conexao.php';

class ProdutoDao {


    public static function insert($produto){

        $conexao = Conexao::conectar();

        $query = "
            INSERT INTO produto
            (
                nome,
                preco,
                custo,
                descricao,
                id_categoria,
                id_tipo,
                id_marca,
                id_status
            )
            VALUES (?,?,?,?,?,?,?,?)
        ";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(1, $produto->getNome());
        $stmt->bindValue(2, $produto->getPreco());
        $stmt->bindValue(3, $produto->getCusto());
        $stmt->bindValue(4, $produto->getDescricao());
        $stmt->bindValue(5, $produto->getIdCategoria());
        $stmt->bindValue(6, $produto->getIdTipo());
        $stmt->bindValue(7, $produto->getIdMarca());
        $stmt->bindValue(8, $produto->getIdStatus());

        return $stmt->execute();
    }


    public static function selectAll($inicio, $limite){

        $conexao = Conexao::conectar();

        $query = "
            SELECT
                p.id_produto,
                p.nome,
                p.preco,
                p.custo,
                p.lucro,
                c.nome AS categoria,
                t.nome AS tipo,
                m.nome AS marca,
                s.nome AS status
            FROM produto p

            LEFT JOIN categoria c
                ON p.id_categoria = c.id_categoria

            LEFT JOIN tipo t
                ON p.id_tipo = t.id_tipo

            LEFT JOIN marca m
                ON p.id_marca = m.id_marca

            LEFT JOIN status s
                ON p.id_status = s.id_status

            LIMIT ?, ?
        ";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(1, $inicio, PDO::PARAM_INT);
        $stmt->bindValue(2, $limite, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();
    }


    public static function totalProdutos(){

        $conexao = Conexao::conectar();

        $query = "SELECT COUNT(*) as total FROM produto";

        $stmt = $conexao->prepare($query);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }


    public static function selectById($id){

        $conexao = Conexao::conectar();

        $query = "
            SELECT *
            FROM produto
            WHERE id_produto = ?
        ";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function delete($id){

        $conexao = Conexao::conectar();

        $query = "
            DELETE FROM produto
            WHERE id_produto = ?
        ";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(1, $id);

        return $stmt->execute();
    }


    public static function update($produto){

        $conexao = Conexao::conectar();

        $query = "
            UPDATE produto SET

                nome = ?,
                preco = ?,
                custo = ?,
                descricao = ?,
                id_categoria = ?,
                id_tipo = ?,
                id_marca = ?,
                id_status = ?

            WHERE id_produto = ?
        ";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(1, $produto->getNome());
        $stmt->bindValue(2, $produto->getPreco());
        $stmt->bindValue(3, $produto->getCusto());
        $stmt->bindValue(4, $produto->getDescricao());
        $stmt->bindValue(5, $produto->getIdCategoria());
        $stmt->bindValue(6, $produto->getIdTipo());
        $stmt->bindValue(7, $produto->getIdMarca());
        $stmt->bindValue(8, $produto->getIdStatus());
        $stmt->bindValue(9, $produto->getId());

        return $stmt->execute();
    }

    public static function selectDashboard($inicio, $limite, $busca = "", $ordenarPor = "id_produto", $ordem = "DESC")
{
    $conexao = Conexao::conectar();

    $colunasPermitidas = [
        'id_produto',
        'nome',
        'preco',
        'custo',
        'lucro',
        'categoria',
        'tipo',
        'marca',
        'status'
    ];

    if (!in_array($ordenarPor, $colunasPermitidas)) {
        $ordenarPor = 'id_produto';
    }

    $ordem = strtoupper($ordem) === 'ASC' ? 'ASC' : 'DESC';

    $orderBy = match ($ordenarPor) {
        'categoria' => 'c.nome',
        'tipo' => 't.nome',
        'marca' => 'm.nome',
        'status' => 's.nome',
        default => 'p.' . $ordenarPor
    };

    $query = "
        SELECT
            p.id_produto,
            p.nome,
            p.preco,
            p.custo,
            p.lucro,
            p.descricao,
            c.nome AS categoria,
            t.nome AS tipo,
            m.nome AS marca,
            s.nome AS status
        FROM produto p
        LEFT JOIN categoria c ON p.id_categoria = c.id_categoria
        LEFT JOIN tipo t ON p.id_tipo = t.id_tipo
        LEFT JOIN marca m ON p.id_marca = m.id_marca
        LEFT JOIN status s ON p.id_status = s.id_status
        WHERE 
            p.nome LIKE :busca1
            OR p.descricao LIKE :busca2
            OR CAST(p.preco AS CHAR) LIKE :busca3
            OR CAST(p.custo AS CHAR) LIKE :busca4
            OR CAST(p.lucro AS CHAR) LIKE :busca5
            OR c.nome LIKE :busca6
            OR t.nome LIKE :busca7
            OR m.nome LIKE :busca8
            OR s.nome LIKE :busca9
        ORDER BY $orderBy $ordem
        LIMIT :inicio, :limite
    ";

    $stmt = $conexao->prepare($query);

    $valorBusca = "%$busca%";

    $stmt->bindValue(':busca1', $valorBusca);
    $stmt->bindValue(':busca2', $valorBusca);
    $stmt->bindValue(':busca3', $valorBusca);
    $stmt->bindValue(':busca4', $valorBusca);
    $stmt->bindValue(':busca5', $valorBusca);
    $stmt->bindValue(':busca6', $valorBusca);
    $stmt->bindValue(':busca7', $valorBusca);
    $stmt->bindValue(':busca8', $valorBusca);
    $stmt->bindValue(':busca9', $valorBusca);

    $stmt->bindValue(':inicio', $inicio, PDO::PARAM_INT);
    $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public static function totalDashboard($busca = "")
{
    $conexao = Conexao::conectar();

    $query = "
        SELECT COUNT(*) as total
        FROM produto p
        LEFT JOIN categoria c ON p.id_categoria = c.id_categoria
        LEFT JOIN tipo t ON p.id_tipo = t.id_tipo
        LEFT JOIN marca m ON p.id_marca = m.id_marca
        LEFT JOIN status s ON p.id_status = s.id_status
        WHERE 
            p.nome LIKE :busca1
            OR p.descricao LIKE :busca2
            OR CAST(p.preco AS CHAR) LIKE :busca3
            OR CAST(p.custo AS CHAR) LIKE :busca4
            OR CAST(p.lucro AS CHAR) LIKE :busca5
            OR c.nome LIKE :busca6
            OR t.nome LIKE :busca7
            OR m.nome LIKE :busca8
            OR s.nome LIKE :busca9
    ";

    $stmt = $conexao->prepare($query);

    $valorBusca = "%$busca%";

    $stmt->bindValue(':busca1', $valorBusca);
    $stmt->bindValue(':busca2', $valorBusca);
    $stmt->bindValue(':busca3', $valorBusca);
    $stmt->bindValue(':busca4', $valorBusca);
    $stmt->bindValue(':busca5', $valorBusca);
    $stmt->bindValue(':busca6', $valorBusca);
    $stmt->bindValue(':busca7', $valorBusca);
    $stmt->bindValue(':busca8', $valorBusca);
    $stmt->bindValue(':busca9', $valorBusca);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}
}


?>