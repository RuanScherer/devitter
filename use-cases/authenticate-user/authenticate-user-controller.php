<?php

include_once __DIR__ . "/authenticate-user-use-case.php";
include_once __DIR__ . "/../../repositories/maria-db/MariaDbUserRepository.php";

class AuthenticateUserController {
  static function handle($userEmail, $userPassword): UseCaseResponse {
    $user_repository = new MariaDbUserRepository();
    $authenticate_user_use_case = new AuthenticateUserUseCase($user_repository);
    return $authenticate_user_use_case->execute($userEmail, $userPassword);
  }
}

?>