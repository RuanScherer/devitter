<?php

include_once __DIR__ . "/../IUserRepository.php";
include_once __DIR__ . "/MariaDbConnection.php";
include_once __DIR__ . "/../../entities/User.php";

class MariaDbUserRepository implements IUserRepository {
  function create($user) {
    $connection = MariaDbConnection::getConnection();
    $statement = $connection->prepare(
      "INSERT INTO User (name, email, username, biography, password) VALUES (?, ?, ?, ?, ?);"
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
      "SELECT * FROM User WHERE email = ? or username = ? LIMIT 1;"
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

  function findOneByEmail($userEmail) {
    $connection = MariaDbConnection::getConnection();
    $statement = $connection->prepare(
      "SELECT * FROM User WHERE email = ? limit 1;"
    );
    $statement->bind_param("s", $userEmail);
    $statement->execute();
    $result = $statement->get_result();
    $data = $result->fetch_assoc();
    return User::fromArray($data);
  }

  function findOneById($user_id) {
    $connection = MariaDbConnection::getConnection();
    $statement = $connection->prepare(
      "SELECT * FROM User WHERE id = ? limit 1;"
    );
    $statement->bind_param("i", $user_id);
    $statement->execute();
    $result = $statement->get_result();

    if ($result->num_rows != 1) return null;

    $data = $result->fetch_assoc();
    return User::fromArray($data);
  }

  function updateBiographyAndDevType($user) {
    $connection = MariaDbConnection::getConnection();
    $statement = $connection->prepare(
      "UPDATE User SET biography = ?, dev_type = ? WHERE id = ?;"
    );
    $statement->bind_param(
      "ssi",
      $user->biography,
      $user->dev_type,
      $user->id
    );
    $statement->execute();
  }
}

?>