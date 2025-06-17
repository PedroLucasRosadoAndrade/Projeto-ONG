<?php
class Denuncia
{
    private $conn;
    private $table = "Denuncia";
    public $id_den;
    public $descricao_den;
    public $tipoAnimal_den;
    public $cidade_den;
    public $situacao_den;
    public $endereco_den;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function listar()
    {
        $query = "SELECT * FROM " . $this->table;
        $resultado = $this->conn->prepare($query);
        $resultado->execute();
        return $resultado;
    }
    public function criar()
    {
        $query = "INSERT INTO " . $this->table . " (descricao_den, tipoAnimal_den, cidade_den, situacao_den, endereco_den) VALUES(:desricao, :tipo, :cidade, :cituacao, :ende)";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':desricao', $this->descricao_den);
        $resultado->bindParam(':tipo', $this->tipoAnimal_den);
        $resultado->bindParam(':cidade', $this->cidade_den);
        $resultado->bindParam(':cituacao', $this->situacao_den);
        $resultado->bindParam(':ende', $this->endereco_den);


        return $resultado->execute();
    }
    public function editar()
    {
        $query = "UPDATE " . $this->table . " SET descricao_den = :desricao, tipoAnimal_den = :tipo, cidade_den = :cidade, endereco_den = :ende WHERE id_den = :idDen";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':desricao', $this->descricao_den);
        $resultado->bindParam(':tipo', $this->tipoAnimal_den);
        $resultado->bindParam(':cidade', $this->cidade_den);
        $resultado->bindParam(':cituacao', $this->situacao_den);
        $resultado->bindParam(':ende', $this->endereco_den);
        $resultado->bindParam(':idDen', $this->id_den);

        return $resultado->execute();
    }
    public function deletar()
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_den = :idDen";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':idDen', $this->id_den);
        return $resultado->execute();

    }
    public function buscarPorId()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_den = :idDen LIMIT 1";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':idDen', $this->id_den);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

}
?>