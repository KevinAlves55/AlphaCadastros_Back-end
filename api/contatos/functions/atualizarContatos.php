<?php
  function atualizarContato($bodyArray, $id) {

    // UPDATE tblcontatos SET nome = 'Luanna Alves Da Silva', email = 'kagamer455677@gmail.com', telefone = '(12) 4548 4644', dataDeNascimento = '2020-12-12', profissao = 'Programador', celular = '(11) 99116-5873', possuiWhatsapp = '1', notificacoesSMS = '1', notificacoesEmail = '1' WHERE id=4
    $sql = "UPDATE tblcontatos SET ";

    $contador = 1;
    foreach (array_keys($bodyArray) as $key) {
      if (count($bodyArray) > $contador) {
        $sql .= "{$key} = '{$bodyArray[$key]}', ";
      } else {
        $sql .= "{$key} = '{$bodyArray[$key]}' ";
      }
      $contador++;
    }

    $sql .= "WHERE id={$id}";

    if ($sql) {
      return $sql;
    } else {
      return false;
    }
  }
?>