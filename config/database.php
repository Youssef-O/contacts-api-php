<?php
class Database {
  private $host = "localhost";
  private $db_name = "contactDB";
  private $username = "user";
  private $password = "0000";
  private $conn;

  public function Connect() {
    $this->conn = null;
    $dns = "mysql:host=" . $this->host . ";database=" . $this->db_name;
    $this->conn = new PDO($dns, $this->username, $this->password);
    return $this->conn;
  }
}






//  class Database {
//     private $host = 'localhost';
//     private $db_name = 'contactdb';
//     private $username = 'user';
//     private $password = '0000';
//     private $conn;

//     $dsn = 'mysql:host=' .$this.host. ';database=' .$this.db;

//     public function connect() {
//       $this->conn = null;
//       $this->conn = new PDO(dsn, $this->username, $this->password);
//       return $this->conn;
//     }
    
//  }