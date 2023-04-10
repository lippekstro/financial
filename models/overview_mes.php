<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/financial/db/conexao.php';

class Mes {
    public $id_mes;
    public $data_mes;
    public $id_despesa;
    public $id_entrada;

    public function __construct($id_mes = false)
    {
        if ($id_mes) {
            $this->id_mes = $id_mes;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT data_mes, id_despesa, id_entrada FROM overview_mes 
        WHERE id_mes = :id_mes";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_mes', $this->id_mes);
        $stmt->execute();

        $lista = $stmt->fetch();
        $this->data_mes = $lista['data_mes'];
        $this->id_despesa = $lista['id_despesa'];
        $this->id_entrada = $lista['id_entrada'];
    }

    public function criar()
    {
        $query = "INSERT INTO overeview_mes (data_mes, id_despesa, id_entrada) VALUES (:data_mes, :id_despesa, :id_entrada)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':data_mes', $this->data_mes);
        $stmt->bindValue(':id_despesa', $this->id_despesa);
        $stmt->bindValue(':id_entrada', $this->id_entrada);
        $stmt->execute();
    }
    
    public static function listar()
    {
        $query = "select * from overview_mes";
        $conexao = Conexao::conectar();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function editar()
    {
        $query = "UPDATE overview_mes SET data_mes = :data_mes WHERE id_mes = :id_mes";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":data_mes", $this->data_mes);
        $stmt->bindValue(":id_mes", $this->id_mes);
        $stmt->execute();
    }

    public function deletar()
    {
        $query = "DELETE FROM overview_mes WHERE id_mes = :id_mes";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_mes', $this->id_mes);
        $stmt->execute();
    }
}