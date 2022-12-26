<?php
  include_once "functions/inserirContatos.php";

  if ($acao === "") {
    echo json_encode(["ERRO" => "Caminho não encontrado"]);
    exit;
  }

  if ($acao === "criar") {
    $body = file_get_contents("php://input");
    $bodyArray = json_decode($body,true);

    $sql = inserirContato($bodyArray);
    $db = DB::connect();
    $rs = $db->prepare($sql);
    $exec = $rs->execute();

    if ($exec) {
      echo json_encode(["contato" => $bodyArray, "mensagem" => "Contato cadastrado com sucesso"]);
      echo header("HTTP/1.1 201 Created");
    } else {
      echo json_encode(["error" => "Erro ao cadastrar contato"]);
      echo header("HTTP/1.1 500 Internal Server Error");
    }
  } else {
    echo header("HTTP/1.1 400 Bad Request");
    echo("<strong>400 Bad Request: URL inválida. O parâmetro /criar deve ser especificado. </strong>");
    exit;
  }
?>