<?php

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

require_once plugin_dir_path( __FILE__ ) . '../Database/Database.php';

class UserController {

  private $conn;
  private $table = 'users';
  private $user = null;
  private $users = [];

  public function __construct() {

    $database = Database::getInstance();
    $this->conn = $database->conn;

  }

  private function request($userEmail = null) {

    if ($userEmail) {
      $query = "SELECT * from " . $this->table . " WHERE email = " . "'" . $userEmail . "'";
    } else {
      $query = "SELECT * from " . $this->table . " ORDER BY last_visit DESC";
    }

    $req = $this->conn->prepare($query);
    $req->execute();
    $num = $req->rowCount();

    if($num > 0) {

      while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $user = array(
          'id' => $id,
          'first_name' => $first_name,
          'last_name' => $last_name,
          'email' => $email,
          'membership' => $membership,
          'last_visit' => $last_visit
        );

        if ($userEmail) {
          $this->user = $user;
        } else {
          array_push($this->users, $user);
        }

      }
    }

  }

  public function showAll() {

    $this->request();
    return $this->users;

  }

  public function showUserByEmail($email) {

    $this->request($email);
    return $this->user;

  }

}
