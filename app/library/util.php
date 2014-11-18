<!--Metodos uteis-->
<?php

class Util{

//metodo para tratar das mensagens
    public static function message($string){
        $json = json_decode(file_get_contents(public_path() . '/message.json'));
        return $json->$string;
    }
//exibição dos dados mais amigavel
    public static function toView($value){
        return date('d/m/Y', strtotime($value));
    }
//formata para a db
    public static function toMySQL($value){
        $date = explode('/', $value);
        return $date[2] . '-' . $date[1] . '-' . $date[0];//retorna o inverso Y-M-D
    }

    //texto grande troca por reticencias
    public static function truncate($string){
        return current(explode('\n', wordwrap($string, 70, '...\n')));
    }

}
