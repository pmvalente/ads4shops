<!--para criar macros para mensagens de erro, acertos, etc...-->
<?php

HTML::macro('flash_message', function(){
    $alerts = array();
    $alert_types = array('error', 'sucess', 'warning', 'info');
    foreach($alert_types as $type){
        if(Session::has($type)){//verifica se tem alguma coisa na sessão
            array_push($alerts, '<div class="flash flash-' . $type . '">');
            array_push($alerts, Session::get($type));//se tem alguma coisa na sessão vamos buscar o tipo
            array_push($alerts, '</div');
        }
        return implode("", $alerts);
    }
});
