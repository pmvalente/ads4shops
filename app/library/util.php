<!--Metodos uteis-->
<?php

class Util

    public static function message($string){
        $json = json_decode(file_get_contents(public_path() . '/message.json'));
        return $json->$string;
    }

    public static function toView($values){

}
