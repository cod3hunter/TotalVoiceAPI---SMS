<!DOCTYPE html>

<?php

  $erro = $_GET['error'];

  if ($erro == 404) {
    # code...
  }

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
            integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
            crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="container">

      <div class="panel panel-primary">

        <div class="panel-heading">
          <center><h1>Enviar SMS</h1></center>
        </div>
        <div class="panel-body">

          <form action="enviar_sms.php" method="post">

              <div class="input-group col-md-12">
                <label for="telefone">Telefone destinatário (obrigatório)</label>
                <input type="text" class="form-control" name="telefone" id="telefone" maxlength="11" placeholder="EX: 48995642318">
              </div>

              <?php

                $erro = $_GET['error'];

                if ($erro == 548) {
                  echo '<span style="color: red;">Telefone incorreto</span>';
                  echo "<br>";
                }

              ?>

              <br>
              <div class="input-group col-md-12">
                <label for="msg">Mensagem (obrigatório)</label>
                <input type="text" class="form-control" name="msg" id="msg" maxlength="150" placeholder="Max 150 Caracteres">
              </div>

              <?php

                $erro = $_GET['error'];

                if ($erro == 725) {
                  echo '<span style="color: red;">Digite uma mensagem</span>';
                  echo "<br>";
                }

              ?>

              <br>
              <button type="submit" class="btn btn-primary col-md-12" id="btnEnviar">Enviar SMS</button>
              <br>
          </form>

        </div>

        <?php

          $sucesso = $_GET['success'];

          if ($sucesso == 1) {
            echo '<center><span style="color: green; font-size:20px">
            Mensagem enviada com sucesso
            </span></center>';
            echo "<br>";
          } elseif ($sucesso == 2) {
            echo '<center><span style="color: red; font-size:20px;">
            Falha ao enviar mensagem tente novamente mais tarde
            </span></center>';
            echo "<br>";
          }

        ?>


      </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body></html>
</html>
