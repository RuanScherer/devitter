<?php

interface IUserRepository {
  public function create($user);
  public function findOneByEmailOrUsername($user);
}

?>