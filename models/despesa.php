<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/financial/db/conexao.php';

class Despesa
{
    public $id_despesa;
    public $nome_despesa;
    public $valor;
    public $data_mes;

    public function __construct($id_despesa = false)
    {
        if ($id_despesa) {
            $this->id_despesa = $id_despesa;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT nome_despesa, valor, data_mes FROM despesas 
        WHERE id_despesa = :id_despesa";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_despesa', $this->id_despesa);
        $stmt->execute();

        $lista = $stmt->fetch();
        $this->nome_despesa = $lista['nome_despesa'];
        $this->valor = $lista['valor'];
        $this->data_mes = $lista['data_mes'];
    }

    public function criar()
    {
        $query = "INSERT INTO  despesas (nome_despesa, valor, data_mes) VALUES (:nome_despesa, :valor, :data_mes)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome_despesa', $this->nome_despesa);
        $stmt->bindValue(':valor', $this->valor);
        $stmt->bindValue(':data_mes', $this->data_mes);
        $stmt->execute();
    }

    public static function listar($mes = null)
    {
        $query = "select * from despesas";
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
        $query = "UPDATE despesas SET nome_despesa = :nome_despesa, valor = :valor, data_mes = :data_mes WHERE id_despesa = :id_despesa";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome_despesa", $this->nome_despesa);
        $stmt->bindValue(":valor", $this->valor);
        $stmt->bindValue(":data_mes", $this->data_mes);
        $stmt->bindValue(":id_despesa", $this->id_despesa);

        $stmt->execute();
    }

    public function deletar()
    {
        $query = "DELETE FROM despesas WHERE id_despesa = :id_despesa";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_despesa', $this->id_despesa);
        $stmt->execute();
    }
}
