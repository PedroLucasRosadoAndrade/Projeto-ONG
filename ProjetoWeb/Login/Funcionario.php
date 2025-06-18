<?php
class Funcionario
{
    private $conn;
    private $table = "Funcionario";
    public $id_fun;
    public $nome_fun;
    public $email_fun;
    public $senha_fun;
    public $comfirmaSenha_fun;



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
        $query = "INSERT INTO " . $this->table . " (nome_fun, email_fun, senha_fun, comfirmaSenha_fun) VALUES(:nome, :email, :senha, :confirmarSen)";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':nome', $this->nome_fun);
        $resultado->bindParam(':email', $this->email_fun);
        $resultado->bindParam(':senha', $this->senha_fun);
        $resultado->bindParam(':confirmarSen', $this->comfirmaSenha_fun);

        return $resultado->execute();
    }
    public function editar()
    {
        $query = "UPDATE " . $this->table . " SET nome_fun = :nome, email_fun = :email, senha_fun = :senha, comfirmaSenha_fun = :confirmarSen WHERE id_fun = :id";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':nome', $this->nome_fun);
        $resultado->bindParam(':email', $this->email_fun);
        $resultado->bindParam(':senha', $this->senha_fun);
        $resultado->bindParam(':confirmarSen', $this->comfirmaSenha_fun);
        $resultado->bindParam(':id', $this->id_fun);

        return $resultado->execute();
    }
    public function deletar()
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_fun = :id";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':id', $this->id_fun);
        return $resultado->execute();
    }
    public function buscarPorId()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_fun = :id LIMIT 1";
        $resultado = $this->conn->prepare($query);
        $resultado->bindParam(':id', $this->id_fun);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }
    public function verificarLogin($email, $senha)
    {
        $sql = "SELECT * FROM Funcionario WHERE email_fun = :email AND senha_fun = :senha";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $dados = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id_fun = $dados['id_fun'];
            return true;
        }
        return false;
    }
}
?>