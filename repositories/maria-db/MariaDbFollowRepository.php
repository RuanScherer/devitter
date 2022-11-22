<?php

include_once __DIR__ . "/../IFollowRepository.php";
include_once __DIR__ . "/MariaDbConnection.php";

class MariaDbFollowRepository implements IFollowRepository {
  function findFollowedUser($follower_id, $followed_id) {
    $connection = MariaDbConnection::getConnection();
    $statement = $connection->prepare("SELECT 1 FROM Follow WHERE follower_id = ? AND followed_id = ? limit 1;");
    $statement->bind_param("ii", $follower_id, $followed_id);
    $statement->execute();
    $result = $statement->get_result();
    return $result->num_rows == 1;
  }

  function create($follower_id, $followed_id) {
    $connection = MariaDbConnection::getConnection();
    $statement = $connection->prepare("INSERT INTO Follow (follower_id, followed_id) VALUES (?, ?);");
    $statement->bind_param("ii", $follower_id, $followed_id);
    $statement->execute();
  }

  function delete($follower_id, $followed_id) {
    $connection = MariaDbConnection::getConnection();
    $statement = $connection->prepare("DELETE FROM Follow WHERE follower_id = ? AND followed_id = ?;");
    $statement->bind_param("ii", $follower_id, $followed_id);
    $statement->execute();
  }
}

?>