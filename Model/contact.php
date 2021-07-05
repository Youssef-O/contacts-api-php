<?php
class Contact {

  private $conn;
  private $table = 'contacts';

  public $id;
  public $fullName;
  public $phoneNumber;
  public $emailAddress;

  public __construct($db) {
    $this->conn = $db;
  }

  public function create() {
    $query = 'INSERT INTO ' . $table ' VALUES(:fullName, :phoneNumber, :emailAddress)';
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':fullName', $this->fullName);
    $stmt->bindParam(':phoneNumber', $this->phoneNumber);
    $stmt->bindParam(':emailAddress', $this->emailAddress);
    if($stmt->execute()) {
      return true;
    } else {
      printf("Error: " . stmt->error);
      return false;
    }
  }
  
  public function read() {
    $query = "SELECT * FROM " . $this->table;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  public function update() {
    $query = 'UPDATE ' . $this->table . 
    ' SET fullName = :fullName, phoneNumber = :phoneNumber, emailAddress = :emailAddress
      WHERE id = :id';
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':fullName', $this->fullName);
    $stmt->bindParam(':phoneNumber', $this->phoneNumber);
    $stmt->bindParam(':emailAddress', $this->emailAddress);
    $stmt->bindParam(':id', $this->id);
    if($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function delete() {
    $query = 'DELETE FROM ' . $this->table . 'WHERE id = :id';
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $this->id);
    if($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
