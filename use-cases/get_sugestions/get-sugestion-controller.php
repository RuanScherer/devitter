<?php

include_once __DIR__ . "/get-sugestion-use-case.php";
include_once __DIR__ . "/../../repositories/maria-db/MariaDbSugestionRepository.php";

class GetSugestionController {
  static function handle($user_id, $user_type) {
    $sugestion_repository = new MariaDbSugestionRepository();
    $get_sugestion_use_case = new GetSugestionUseCase($sugestion_repository);
    return $get_sugestion_use_case->execute($user_id, $user_type);
  }
}

?>