<?php
  include_once "functions/inserirContatos.php";

  if ($acao === "") echo json_encode(["ERRO" => "Caminho não encontrado"]);

  if ($acao === "criar") {
    $body = file_get_contents('php://input');
    $bodyJson = json_decode($body,true);

    $sql = inserirContato($bodyJson);

    $db = DB::connect();
    $rs = $db->prepare($sql);
    $exec = $rs->execute();

    if ($exec) {
      echo json_encode(["contato" => $bodyJson, "mensagem" => "Contato cadastrado com sucesso"]);
    } else {
      echo json_encode(["error" => "Erro ao cadastrar contato"]);
    }
  }
?>