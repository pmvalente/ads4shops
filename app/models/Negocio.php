<?php

class Negocio extends BaseModel
{
    protected $table = 'negocios';

    protected  $fillable = array('nome');

    public static $rules = array(
        'nome' => 'required|min:3'
    );

    public function negocios()
    {
        return $this-> hasMany('Utilizador', 'negocio_id'); //segue padrão do Laravel
    }

}