<?php

class Database {

private $host = "localhost";
private $db_name = membership_db;
private $username = membership_username;
private $password = membership_password;
public  $conn;

private function __construct() {
  $this->conn = null;

  try {
    $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
    $this->conn->exec("set names utf8mb4");
  } catch(PDOException $exception){
      echo "Connection error: " . $exception->getMessage();
  }
}

private static $instance = null;

public static function getInstance(){

  if(is_null(self::$instance)) {
    self::$instance = new self;
  }

  return self::$instance;

}

private function __clone() {}
private function __wakeup() {}

}
