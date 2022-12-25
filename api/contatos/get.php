<?php
  if ($acao === "" && $params === "") echo json_encode(["ERRO" => "Caminho não encontrado"]);

  if ($acao === "listar" && $params === "") {
    $db = DB::connect();
    $rsDados = $db->prepare("SELECT * FROM tblcontatos");
    $rsDados->execute();
    $result = $rsDados->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
      echo json_encode(["dados" => $result]);
    } else {
      echo json_encode(["dados" => "Não existem dados de contatos"]);
    }
  }
?>