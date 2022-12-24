<?php
  class DB {
    public static function connect() {
      $local = "localhost";
      $user = "root";
      $password = "bcd127";
      $base = "alphaCadastros";

      return new PDO("mysql:host={$local};dbname={$base};charset=UTF8;", $user, $password);
    }
  }
?>