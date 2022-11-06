<?php

include_once __DIR__ . "/../IUserRepository.php";
include_once __DIR__ . "/MariaDbConnection.php";
include_once __DIR__ . "/../../entities/User.php";

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

  function findOneByEmailOrUsername($user) {
    $connection = MariaDbConnection::getConnection();
    $statement = $connection->prepare(
      "SELECT * FROM user WHERE email = ? or username = ? limit 1;"
    );
    $statement->bind_param(
      "ss",
      $user->email,
      $user->username
    );
    $statement->execute();
    $result = $statement->get_result();
    $data = $result->fetch_assoc();
    return User::fromArray($data);
  }
}

?>