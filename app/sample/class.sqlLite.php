<?php

class SimpanHash {
    var $db;

    function __construct() {
        $this->db = new SQLite3('mysqlitedb.db');
        $this->db->exec('CREATE TABLE IF NOT EXISTS hashTable (id INTEGER PRIMARY KEY, hashing STRING, dt DATE)');
    }
    function tambahHash($hash) {
        if ($this->checkHash($hash) == 0) {
            $this->db->exec("INSERT INTO hashTable (hashing, dt) VALUES ('$hash', date('now'))");    
        }
    }
    function checkHash($hash) {
        $stmt = $this->db->prepare("SELECT hashing,dt FROM hashTable WHERE hashing=:hs");
        $stmt->bindValue(':hs',$hash,SQLITE3_TEXT);
        $result = $stmt->execute();
        // var_dump($result->fetchArray());
        $data = $result->fetchArray();
        if (!$data)
            return 0;
        else
            return count($data);
        // return ($data != '');
    }
    function viewList() {
        $stmt = $this->db->prepare("SELECT hashing,dt FROM hashTable");
        // $stmt->bindValue(':hs',$hash,SQLITE3_TEXT);
        $result = $stmt->execute();
        $data = $result->fetchArray(SQLITE3_ASSOC);
        print_r($data);
       /* foreach($data as $val) {
            echo "<pre>";
            print_r($val);
            echo "</pre>";
        }*/
    }
    function flush() {
        $rs = $this->db->exec("DELETE FROM hashTable");
        //echo $rs;
        // $stmt->bindValue(':hs',$hash,SQLITE3_TEXT);
        // $result = $this->db->exec("DELETE FROM hashTable");
        // $result = $this->db->exec("VACUUM");
    }
}
/*
$si = new SimpanHash();
// $si->flush();
// $si->tambahHash('adasatu');
$rst=$si->checkHash('test');
// var_dump($rst);
// print_r($rst);
if ($rst) {
    echo 'ada';
} else {
    echo 'takda';
}
$si->viewList();
*/
// // $db = new PDO('sqlitunlink('mysqlitedb.db');
// $db = new SQLite3('mysqlitedb.db');

// $db->exec('CREATE TABLE foo (id INTEGER, bar STRING)');
// $db->exec("INSERT INTO foo (id, bar) VALUES (1, 'This is a test')");

// $stmt = $db->prepare('SELECT bar FROM foo WHERE id=:id');
// $stmt->bindValue(':id', 1, SQLITE3_INTEGER);

// $result = $stmt->execute();
// var_dump($result->fetchArray());