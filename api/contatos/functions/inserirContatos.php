<?php
  function inserirContato($bodyArray) {
    $sql = "INSERT INTO tblcontatos(";

    $contador = 1;
    foreach (array_keys($bodyArray) as $key) {
      if (count($bodyArray) > $contador) {
        $sql .= "{$key},";
      } else {
        $sql .= "{$key}";
      }
      $contador++;
    }

    $sql .= ") VALUES (";

    $contador = 1;
    foreach (array_values($bodyArray) as $value) {
      if (count($bodyArray) > $contador) {
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