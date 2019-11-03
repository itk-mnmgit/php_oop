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
    public function get($id){
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM '.$this->table.' WHERE id = ?');
        $stmt->execute([$id]);
        $task = $stmt->fetch();
        return $task;
    }
    public function update($name, $id){
        $stmt = $this->db_manager->dbh->prepare('UPDATE ' . $this->table .' SET name = ? WHERE id = ?');
        $stmt->execute([$name, $id]);
    }
    public function delete($id){
        $stmt = $this->db_manager->dbh->prepare('DELETE FROM '.$this->table.' WHERE id = ?');
        $stmt->execute([$id]);
    }
    public function asc(){
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM '.$this->table.' ORDER BY update_at ASC');
        $stmt->execute();
        $tasks = $stmt->fetchAll();
        return $tasks;
    }
    public function desc(){
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM '.$this->table.' ORDER BY update_at DESC');
        $stmt->execute();
        $tasks = $stmt->fetchAll();
        return $tasks;
    }

}