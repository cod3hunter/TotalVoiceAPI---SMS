<?php

require_once "TotalVoiceAPI.class.php";

$telefone_dest = $_POST['telefone']; //Recupera telefone por POST
$msg = $_POST['msg']; //Recupera mensagem por POST

//Instancia TotalVoiceAPI recebendo como parametro o Token disponivel em https://api.totalvoice.com.br/painel
$api = new TotalVoiceAPI("INSERT_TOKEN");

 if (strlen($telefone_dest) >= 10 && // Verifica se os campos
     strlen($telefone_dest) <= 11){ // foram preenchidos corretamente

       if (strlen($msg) == 0) { //verifica se a mensagem foi digitada
         echo "mensagem invalida";
         header('Location: index.php?error=725');
         die();
       }

  $api->debugOn(); //Modo debug ativado

  $api->returnAssoc(); //configura o retorno dos metodos como um array associativo, exemplo: $retorno['msg']

  $result = $api->enviaSMS($telefone_dest, $msg); //Passa o resultado da requisição para a variavel $result

  if ($result['status'] == 200) { //Verifica se a mensagem foi enviada com sucesso
      header('Location: index.php?success=1');
  }else { //executa o código abaixo caso não tenha sucesso no envio da mensagem
      header('Location: index.php?success=2');
  }

} else { // executa o código abaixo caso o telefone não estaja correto

  header('Location: index.php?error=548');

}
