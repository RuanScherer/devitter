<?php

include_once __DIR__ . "/get-user-by-id-use-case.php";
include_once __DIR__ . "/../../repositories/maria-db/MariaDbUserRepository.php";

class GetUserByIdController {
  static function handle($user_id) {
    $user_repository = new MariaDbUserRepository();
    $get_user_by_id_use_case = new GetUserByIdUseCase($user_repository);
    return $get_user_by_id_use_case->execute($user_id);
  }
}

?>