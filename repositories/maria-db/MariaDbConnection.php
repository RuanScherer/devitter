<?php

class MariaDbConnection {
  const SERVER = "localhost:3307";
  const USERNAME = "root";
  const PASSWORD = "";
  const DATABASE = "devitter";

  private static $connection;

  static function getConnection() {
    if (isset(self::$connection)) {
      return self::$connection;
    }

    self::connect();
    return self::$connection;
  }

  private static function connect() {
    try {
      self::$connection = new mysqli(self::SERVER, self::USERNAME, self::PASSWORD, self::DATABASE);
    } catch (Exception $exception) {
      var_dump($exception);
    }
  }
}

?>