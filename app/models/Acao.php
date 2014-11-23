<?php

class  Acao extends BaseModel
{
    protected $table = 'acoes';

    protected $fillable = array('nome','metodo');

    public static $rules = array(
        'nome' => 'required|min:3|max:255',
        'metodo' => 'required|min:3|max:255',
    );

    public function perfis(){
        return $this->belongsToMany('Perfil', 'acoes_perfis');
    }
}