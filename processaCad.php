<?php
    $server = "localhost";
    $username = "ivsg";
    $password = "";
    $database = "si_pweb";
    

    $connection = new mysqli($server, $username, $password, $database);
    
    if($connection->connect_error){
        die("Conexão falhou ".$connection->connect_error);
    } else {
        echo "Conexão realizada.";
        if($_REQUEST){
            $nomeCompleto = $_POST["name"];
            $nomeDeUsuario = $_POST["user"];
            $email = $_POST["email"];
            $senha = $_POST["password"];
            
    
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

    //Senha criptografada

    $str = '123456';

    if (md5($str) === 'e10adc3949ba59abbe56e057f20f883e') {
        echo "A string '123456' foi convertida em 'e10adc3949ba59abbe56e057f20f883e'";
        exit;
    }

    $senha = $_REQUEST['senha'

    $senhaCriptografada = md5($senha);

?>
