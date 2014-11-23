<?php

class Utilizador extends BaseModel
{
    protected $table = 'utilizadores';

    protected  $fillable = array('nome', 'negocio_id', 'username', 'email', 'password', 'ativo', 'perfil_id');

    public static $rules = array(
        'nome' => 'required|min:3|max:120',
        'negocio_id' => 'required|max:10',
        'username' => 'required|min:3|max:25',
        'email' => 'required|min:3|max:120',
        'password' => 'required|min:6|max:80',
        'ativp' => 'required',
        'perfil_id' => 'required|max:10',
    );

    public function perfis()
    {
        return $this->belongsTo('Perfil');//passo só o nome do model
    }

    public function negocios()
    {
        return $this->belongsTo('Negocio');//passo só o nome do model
    }

    public function anuncios()
    {
        return $this->hasMany('Anuncio');//passo só o nome do model
    }

}