<?php

include_once __DIR__ . "/../IUserRepository.php";
include_once __DIR__ . "/MariaDbConnection.php";

class MariaDbUserRepository implements IUserRepository {
  function create($user) {
    $connection = MariaDbConnection::getConnection();
    $statement = $connection->prepare(
      "INSERT INTO user (name, email, username, biography, password) VALUES (?, ?, ?, ?, ?);"
    );
    $statement->bind_param(
      "sssss",
      $user->name,
      $user->email,
      $user->username,
      $user->biography,
      $user->password
    );
    $statement->execute();
  }
}

?>