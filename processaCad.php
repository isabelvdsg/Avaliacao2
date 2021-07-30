<?php
    $server = "localhost";
    $username = "ivsg";
    $password = "";
    $database = "si_pweb";
    

    $str = '123456';

    if (md5($str) === 'e10adc3949ba59abbe56e057f20f883e') {
        echo "A string '123456' foi convertida em 'e10adc3949ba59abbe56e057f20f883e'";
        exit;
    }

    $connection = new mysqli($server, $username, $password, $database);
    
    if($connection->connect_error){
        die("Conexão falhou ".$connection->connect_error);
    } else {
        echo "Conexão realizada.";
        if($_REQUEST){
            $nomeCompleto = $_POST["name"];
            $nomeDeUsuario = $_POST["user"];
            $email = $_POST["email"];
            $senha = MD5($_POST["password"]); //senha criptografada
            $array = mysql_fetch_array($select);
            $cadarray = $array['user'];
            $array = mysql_fetch_array($select);
            $emailarray = $array['email'];
    
            if($nomeDeUsuario == "" || $nomeDeUsuario == null){
               echo"<script language='javascript' type='text/javascript'>
               alert('O campo login deve ser preenchido');window.location.href='
               cadastro.html';</script>";

            //Verificando se nome de usuario e email ja foram inseridos

            }else{
               if($cadarray == $nomeDeUsuario){

                  echo"<script language='javascript' type='text/javascript'>
                  alert('Esse nome de usuario já existe');window.location.href='
                  cadastro.html';</script>";
                  die();

            }if($emailarray == $email){
                  echo"<script language='javascript' type='text/javascript'>
                  alert('Esse email já existe');window.location.href='
                  cadastro.html';</script>";
                  die();

            }else{
              $sql = "INSERT INTO usuarios (nome_completo, nome_usuario, email, senha) VALUES ('$nomeCompleto','$nomeDeUsuario', '$email', '$senha')";
              if($connection->query($sql)){
                 echo "Usuário inserido com sucesso.";
              } else {
                 echo "Erro ".$sql." ".$connection->error;
              }
        }
    }


    //Conexao PDO

    try {
    $conn = new PDO('mysql:host=localhost;dbname=si_pweb', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    $stmt = $conn->prepare('SELECT * FROM usuarios WHERE nome_usuario = :usuario');
    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_INT);
    $stmt->execute();
 
    $result = $stmt->fetchAll();
 
    if ( count($result) ) {
        foreach($result as $row) {
          print_r($row);
        }
      } else {
        echo "Nenhum resultado retornado.";
      }
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }




   

?>
