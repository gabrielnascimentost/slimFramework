<?php
class Lista {
    
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function getLista() {
        $array = array();
        $sql = $this->db->query("SELECT * FROM lista");
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    public function add($data){
        $sql = $this->db->prepare("INSERT INTO lista (id, nome, telefone)
        VALUES (NULL, :m_nome, :m_telefone)");
        $sql->bindValue(":nome", $data['nome']);
        $sql->bindValue(":telefone", $data['telefone']);
        $sql->execute;
    }
    
}