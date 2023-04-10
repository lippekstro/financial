<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/financial/db/conexao.php';

class Entrada
{
    public $id_entrada;
    public $nome_entrada;
    public $valor;
    public $data_mes;

    public function __construct($id_entrada = false)
    {
        if ($id_entrada) {
            $this->id_entrada = $id_entrada;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT nome_entrada, valor, data_mes FROM entradas 
        WHERE id_entrada = :id_entrada";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_entrada', $this->id_entrada);
        $stmt->execute();

        $lista = $stmt->fetch();
        $this->nome_entrada = $lista['nome_entrada'];
        $this->valor = $lista['valor'];
        $this->data_mes = $lista['data_mes'];
    }

    public function criar()
    {
        $query = "INSERT INTO  entradas (nome_entrada, valor, data_mes) VALUES (:nome_entrada, :valor, :data_mes)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome_entrada', $this->nome_entrada);
        $stmt->bindValue(':valor', $this->valor);
        $stmt->bindValue(':data_mes', $this->data_mes);
        $stmt->execute();
    }

    public static function listar($mes = null)
    {
        $query = "select * from entradas";
        if ($mes) {
            // Filtra por mês
            $query .= " WHERE MONTH(data_mes) = :mes";
        }
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        if ($mes) {
            $stmt->bindValue(':mes', $mes);
        }
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public function editar()
    {
        $query = "UPDATE entradas SET nome_entrada = :nome_entrada, valor = :valor, data_mes = :data_mes WHERE id_entrada = :id_entrada";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome_entrada", $this->nome_entrada);
        $stmt->bindValue(":valor", $this->valor);
        $stmt->bindValue(":data_mes", $this->data_mes);
        $stmt->bindValue(":id_entrada", $this->id_entrada);

        $stmt->execute();
    }

    public function deletar()
    {
        $query = "DELETE FROM entradas WHERE id_entrada = :id_entrada";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_entrada', $this->id_entrada);
        $stmt->execute();
    }
}
