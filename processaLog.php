
<? php
    $user = $ _REQUEST [ "usuário" ];
    $senha = $ _REQUEST [ "senha" ];
    if ( $ user == "admin" && $ password == "123456" ) {
        session_start ();
        $ _SESSION [ "usuário" ] = $ usuário ;
        $ _SESSION [ "senha" ] = $ senha ;
        echo  "Usuário logado.";
    }else {
        echo  "Acesso negado." ;
    }
    
?>
