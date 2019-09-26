<?php

class Lista {
    
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getLista(){
        $array = array();

        $sql = $this->db->query("SELECT * FROM casas");

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function add($data){
        $sql = $this->db->prepare("INSERT INTO casas SET Endereco = :endereco, 
        Bairro = :bairro, Cep = :cep, Cidade = :cidade");

        $sql->bindValue(":endereco", $data ["Endereco"]);
        $sql->bindValue(":bairro", $data ["Bairro"]);
        $sql->bindValue(":cep", $data ["Cep"]);
        $sql->bindValue(":cidade", $data ["Cidade"]);

        $sql->execute();
    }

    public function getContato($id){
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM casas where Id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0){
            $array = $sql->fetch();
        }

        return $array;
    }

    public function update($data, $nome){
        $sql = $this->db->prepare("UPDATE INTO lista SET Nome = :nome, 
        Telefone = :telefone, Cpf = :cpf WHERE Nome = :nome");

        $sql->bindValue(":nome", $data ["Nome"]);
        $sql->bindValue(":telefone", $data ["Telefone"]);
        $sql->bindValue(":cpf", $data ["Cpf"]);
    }

    public function del($nome) {
        $sql = $this->db->prepare("DELETE FROM lista WHERE Nome = :nome");
        $sql->bindValue(":nome", $nome);
        $sql->execute();
    }
}