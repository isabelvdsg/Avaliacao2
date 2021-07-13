<?php
    $server = "localhost";
    $username = "root";
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
