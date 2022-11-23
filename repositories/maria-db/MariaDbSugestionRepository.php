<?php

include_once __DIR__ . "/../ISugestionRepository.php";
include_once __DIR__ . "/MariaDbConnection.php";
include_once __DIR__ . "/../../entities/User.php";

class MariaDbSugestionRepository implements ISugestionRepository {

  function findAllByUser($user_id, $user_type) {
    $connection = MariaDbConnection::getConnection();
    $statement = $connection->prepare(
    "SELECT u.* FROM User u
        WHERE u.id <> ? 
        AND u.dev_type IS NOT NULL 
        AND u.dev_type = ?
        AND NOT EXISTS(SELECT 1 FROM Follow f where f.follower_id = ? and f.followed_id = u.id)
        LIMIT 3;"
    );
    $statement->bind_param(
      "is",
      $user_id,
      $user_type,
      $user_id
    );
    $statement->execute();
    $result = $statement->get_result();
    $sugestions = [];
    while ($row = $result->fetch_assoc()) {
      array_push($sugestions, User::fromArray($row));
    }
    return $sugestions;
  }

}

?>