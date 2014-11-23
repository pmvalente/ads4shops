<?php

class  Perfil extends BaseModel
{
    protected $table = 'perfis';

    protected $fillable = array('nome');

    public static $rules = array(
        'nome' => 'required|min:3|max:45',
    );

    public function utilizadores(){
        return $this->hasMany('Utilizador'); //segue padrão do Laravel
    }

    public function acoes(){
        return $this->belongsToMany('Acao', 'acoes_perfis');
    }
}