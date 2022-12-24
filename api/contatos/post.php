<?php 
  if ($acao === "") echo json_encode(["ERRO" => "Caminho não encontrado"]);

  if ($acao === "criar") {
    $body = file_get_contents('php://input');
    print_r($body);
  }
?>