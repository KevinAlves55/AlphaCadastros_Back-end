<?php
  if ($acao === "" && $params === "") echo json_encode(["ERRO" => "Caminho não encontrado"]);

  if ($acao === "listar" && $params === "") {
    $db = DB::connect();
    $script = $db->prepare("SELECT * FROM tblcontatos");
    $script->execute();
    $result = $script->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
      echo json_encode(["dados" => $result]);
    } else {
      echo json_encode(["dados" => "Não existem dados de contatos"]);
    }
  }
?>