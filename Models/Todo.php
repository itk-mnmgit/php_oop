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
    //DBの一覧を呼び出すメソッド
    public function all(){
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM '.$this->table);
        $stmt->execute();
        $tasks = $stmt->fetchAll();
        return $tasks;
    }
}