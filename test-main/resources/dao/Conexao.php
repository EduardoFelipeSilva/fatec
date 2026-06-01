<?php
class Conexao
{
    public static function conectar()
    {
        $servidor = "zephyr.proxy.rlwy.net";
        $porta = "57309";
        $banco = "railway";
        $usuario = "root";
        $senha = "OegcwTymITDxxJIKHIMfoKbSwXmiFPjS";

        try {
            $conexao = new PDO(
                "mysql:host=$servidor;port=$porta;dbname=$banco;charset=utf8",
                $usuario,
                $senha
            );

            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexao->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            return $conexao;

        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());    
        }
    }
}
?>