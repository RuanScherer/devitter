<?php

interface IFollowRepository {
  public function findFollowedUser($follower_id, $followed_id);
}

?>