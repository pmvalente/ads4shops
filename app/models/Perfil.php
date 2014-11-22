<?php

class  Perfil extends BaseModel
{
    protected $table = 'perfis';

    protected $fillable = array('descricao');

    public static $rules = array(
        'descricao' => 'required|min:3|max:45',
    );

    public function utilizadores(){
        return $this->hasMany('Utilizador', 'peril_id'); //segue padrão do Laravel
    }

    public function acoes(){
        return $this->belongsToMany('Acao', 'acoes_perfis', 'perfil_id', 'acao_id');
    }
}