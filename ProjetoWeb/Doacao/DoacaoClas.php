<?php
class Doacao
{
    private $conn;
    private $table = "Doacao";
    public $id_doa;
    public $tipo_doa;
    public $nomeProd_doa;
    public $quantidade_doa;

    

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
        $query = "INSERT INTO " . $this->table . " (tipo_doa, nomeProd_doa, quantidade_doa) VALUES(:tipo, :nomePro, :quantiPro)";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':tipo', $this->tipo_doa);
        $resultado->bindParam(':nomePro', $this->nomeProd_doa);
        $resultado->bindParam(':quantiPro', $this->quantidade_doa);

        return $resultado->execute();
    }
    public function editar()
    {
        $query = "UPDATE " . $this->table . " SET tipo_doa = :tipo, nomeProd_doa = :nomePro, quantidade_doa = :quantiPro WHERE id_doa = :idDoa";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':tipo', $this->tipo_doa);
        $resultado->bindParam(':nomePro', $this->nomeProd_doa);
        $resultado->bindParam(':quantiPro', $this->quantidade_doa);
        $resultado->bindParam(':idDoa', $this->id_doa);
        
        return $resultado->execute();
    }
    public function deletar()
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_doa = :idDoa";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':idDoa', $this->id_doa);
        return $resultado->execute();
        
    }
    public function buscarPorId()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_doa = :idDoa LIMIT 1";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':idDoa', $this->id_doa);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

}
?>