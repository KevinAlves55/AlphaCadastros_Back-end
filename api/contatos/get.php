<?php
  if ($acao === "" && $params === "") echo json_encode(["ERRO" => "Caminho não encontrado"]);

  if ($acao === "listar" && $params === "") {
    $db = DB::connect();
    $sql = $db->prepare("SELECT * FROM tblcontatos");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
      echo json_encode(["dados" => $result]);
    } else {
      echo json_encode(["dados" => "Não existem dados de contatos"]);
    }
  }
?>