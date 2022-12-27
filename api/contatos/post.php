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
    $result = $db->lastInsertId();

    $responseBody = array(
      ...$bodyArray,
      "id" => $result
    );

    if ($exec) {
      echo json_encode(["contato" => $responseBody, "mensagem" => "Contato cadastrado com sucesso"]);
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