<?php
  function inserirContato($bodyJson) {
    $sql = "INSERT INTO tblcontatos(";

    $contador = 1;
    foreach (array_keys($bodyJson) as $key) {
      if (count($bodyJson) > $contador) {
        $sql .= "{$key},";
      } else {
        $sql .= "{$key}";
      }
      $contador++;
    }

    $sql .= ") VALUES (";

    $contador = 1;
    foreach (array_values($bodyJson) as $value) {
      if (count($bodyJson) > $contador) {
        $sql .= "'{$value}',";
      } else {
        $sql .= "'{$value}'";
      }
      $contador++;
    }

    $sql .= ");";

    if ($sql) {
      return $sql;
    } else {
      return false;
    }
  }
?>