<?php

interface IPostRepository {
  public function create($post);
  function findByUserId($user_id);
  public function findFromFollowedUsers($post);
}

?>