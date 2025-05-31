<?php
class Usuario
{
    private $conn;
    private $table = "Usuario";
    public $id_usu;
    public $nome_usu;
    public $email_usu;
    public $senha_usu;
    public $comfirmaSenha_usu;
    public $id_den_fk;

    

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
        $query = "INSERT INTO " . $this->table . " (nome_usu, email_usu, senha_usu, comfirmaSenha_usu) VALUES(:nome, :email, :senha, :confirmarSen)";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':nome', $this->nome_usu);
        $resultado->bindParam(':email', $this->email_usu);
        $resultado->bindParam(':senha', $this->senha_usu);
        $resultado->bindParam(':confirmarSen', $this->comfirmaSenha_usu);

        return $resultado->execute();
    }
    public function editar()
    {
        $query = "UPDATE " . $this->table . " SET nome = :nome, cpf = :cpf, telefone = :telefone, email = :email, endereco = :endereco WHERE id = :id";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':nome', $this->nome_usu);
        $resultado->bindParam(':email', $this->email_usu);
        $resultado->bindParam(':senha', $this->senha_usu);
        $resultado->bindParam(':confirmarSen', $this->comfirmaSenha_usu);
        $resultado->bindParam(':id', $this->id_usu);
        
        return $resultado->execute();
    }
    public function deletar()
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_usu = :id";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':id', $this->id_usu);
        return $resultado->execute();
    }
    public function buscarPorId()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_usu = :id LIMIT 1";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':id', $this->id_usu);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }
}
?>