<?php
  include_once "functions/atualizarContatos.php";

  if ($acao === "") {
    echo json_encode(["ERRO" => "Caminho não encontrado"]);
    exit;
  }

  if ($acao === "atualizar" && $params === "") {
    echo json_encode(["ERRO" => "Informe um ID para ser atualizado"]);
    echo header("HTTP/1.1 400 Bad Request");
    echo("<strong>400 Bad Request: URL inválida. O parâmetro /atualizar/idDoContato deve ser especificado. </strong>");
    exit;
  }

  if ($acao === "atualizar" && $params !== "") {
    $body = file_get_contents("php://input");
    $bodyArray = json_decode($body, true);
    
    $sql = atualizarContato($bodyArray, $params);
    $db = DB::connect();
    $rs = $db->prepare($sql);
    $exec = $rs->execute();

    if ($exec) {
      echo json_encode(["contato" => $bodyArray, "mensagem" => "Contato atualizado com sucesso"]);
    } else {
      echo json_encode(["error" => "Erro ao atualizar contato"]);
      echo header("HTTP/1.1 500 Internal Server Error");
    }
  } else {
    echo header("HTTP/1.1 400 Bad Request");
    echo("<strong>400 Bad Request: URL inválida. O parâmetro /atualizar/idDoContato deve ser especificado. </strong>");
    exit;
  }
?>