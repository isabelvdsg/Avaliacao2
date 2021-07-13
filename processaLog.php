
<? php
    $user = $ _REQUEST [ "usuário" ];
    $senha = $ _REQUEST [ "senha" ];
    if ( $ user == "admin" && $ password == "123456" ) {
        session_start ();
        $ _SESSION [ "usuário" ] = $ usuário ;
        $ _SESSION [ "senha" ] = $ senha ;
        echo  "Usuário logado.";
    <a  href = " exibir.php " > Exibir Usuário </ a> 
    }else {
        echo  "Acesso negado." ;
    }
    
?>
