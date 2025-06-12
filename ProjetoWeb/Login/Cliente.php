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
        $query = "UPDATE " . $this->table . " SET nome_usu = :nome, email_usu = :email, senha_usu = :senha, confirmarSen = :comfirmaSenha_usu WHERE id_usu = :idCli";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':nome', $this->nome_usu);
        $resultado->bindParam(':email', $this->email_usu);
        $resultado->bindParam(':senha', $this->senha_usu);
        $resultado->bindParam(':confirmarSen', $this->comfirmaSenha_usu);
        $resultado->bindParam(':idCli', $this->id_usu);
        
        return $resultado->execute();
    }
    public function deletar()
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_usu = :idCli";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':idCli', $this->id_usu);
        return $resultado->execute();
        
    }
    public function buscarPorId()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_usu = :idCli LIMIT 1";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':idCli', $this->id_usu);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    public function verificarLogin($email, $senha) {
    $sql = "SELECT * FROM Usuario WHERE email_usu = :email AND senha_usu = :senha";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id_usu = $dados['idCli'];
        return true;
    }
    return false;
}
}
?>