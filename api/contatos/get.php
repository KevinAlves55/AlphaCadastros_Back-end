<?php
  if ($acao === "") {
    echo json_encode(["ERRO" => "Caminho não encontrado"]);
    exit;
  }

  if ($acao === "listar" && $params === "") {
    $db = DB::connect();
    $rsDados = $db->prepare("SELECT * FROM tblcontatos");
    $rsDados->execute();
    $result = $rsDados->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
      echo json_encode($result);
    } else {
      echo json_encode(["dados" => "Não existem dados de contatos"]);
      echo header("HTTP/1.1 500 Internal Server Error");
    }
  } else if ($acao === "listar" && $params !== "") {
    $db = DB::connect();
    $rsDados = $db->prepare("SELECT * FROM tblcontatos WHERE id={$params}");
    $rsDados->execute();
    $result = $rsDados->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
      echo json_encode($result);
    } else {
      echo json_encode(["dados" => "Não existem dados de contatos"]);
      echo header("HTTP/1.1 500 Internal Server Error");
    }
  }
?>