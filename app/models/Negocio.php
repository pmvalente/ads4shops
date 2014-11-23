<?php

class Negocio extends BaseModel
{
    protected $table = 'negocios';

    protected  $fillable = array('nome');

    public static $rules = array(
        'nome' => 'required|min:3|max:120|unique:negocios,nome'
    );

    public function negocios()
    {
        return $this-> hasMany('Utilizador', 'negocio_id'); //segue padrão do Laravel
    }


    public static function validate($data)
    {
        if(Request::getMethod() == 'PUT'){
            $id = $data['id'];
            self::$rules['nome'] .= ",$id";
        }

        return Validator::make($data, self::$rules);
    }

}