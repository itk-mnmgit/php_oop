<?php

require_once 'config/dbconnect.php';

class Todo{

    private $table = 'tasks';
    private $db_manager;

    public function __construct(){
    //インスタンス化
        $this->db_manager = new DbManager();
    //インスタンス内のメソッドを呼び出す
        $this->db_manager->connect();
    }

    public function create($name){
        $stmt = $this->db_manager->dbh->prepare('INSERT INTO ' . $this->table .' (name) VALUES (?)');
        $stmt->execute([$name]);
    }
}