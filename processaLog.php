
<? php
    include 'processaCad.php';
    $user = $ _REQUEST [ "usuário" ];
    $senha = $ _REQUEST [ "senha" ];
    if ( $ user == "admin" && $ password == "123456" ) {
        session_start ();
        $ _SESSION [ "usuário" ] = $ usuário ;
        $ _SESSION [ "senha" ] = $ senha ;
        echo  "Usuário logado.";

        $sql = "SELECT * FROM usuarios;";

    }else {
        echo  "Acesso negado." ;
    }

    $pesquisar = $_POST['pesquisar'];
        $result_usuarios = "SELECT * FROM usuarios WHERE usuario LIKE '%$pesquisar%' LIMIT 5";
        $resultado_usuarios = mysqli_query($conn, $result_usuarios);
    
     while($rows_usuarios = mysqli_fetch_array($resultado_usuarios)){
        echo "Nome do usuário: ".$rows_usuarios['usuario']."<br>";
    }
    
?>
