<?php
  if ($acao === "") {
    echo json_encode(["ERRO" => "Caminho não encontrado"]);
    exit;
  }

  if ($acao === "" && $params === "") {
    echo json_encode(["ERRO" => "Informe um ID para ser deletado"]);
    echo header("HTTP/1.1 400 Bad Request");
    echo("<strong>400 Bad Request: URL inválida. O parâmetro /deletar/idDoContato deve ser especificado. </strong>");
    exit;
  };

  if ($acao === "deletar" && $params !== "") {
    $db = DB::connect();
    $rsDadosDelete = $db->prepare("DELETE FROM tblcontatos WHERE id={$params}");
    $exec = $rsDadosDelete->execute();

    if ($exec) {
      echo(json_encode(["mensagem" => "Contato deletado com sucesso"]));
    } else {
      echo json_encode(["mensagem" => "Erro ao deletar contato"]);
      echo header("HTTP/1.1 500 Internal Server Error");
    }
  } else {
    echo header("HTTP/1.1 400 Bad Request");
    echo("<strong>400 Bad Request: URL inválida. O parâmetro /deletar/idDoContato deve ser especificado. </strong>");
    exit;
  }
?>