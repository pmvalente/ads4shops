<?php

class Anuncio extends BaseModel
{
    protected $table = 'anuncios';

    protected $fillable = array('nome', 'utilizador_id', 'inicio', 'fim',
        'ativo', 'autorizado', 'inibir');

    public static $rules = array(
        'nome' => 'required|min:3|max:120',
        'utilizador_id' => 'required|integer',
        'inicio' => 'required|date_format:d/m/Y',
        'fim' => 'required|date_format:d/m/Y',
        'ativo' => 'required|bolean',
        'autorizado' => 'required|bolean',
        'inibir' => 'required|bolean',
    );

    //relacionamentos
    public function anuncio()
    {
        return $this->belongsTo('Utilizador');
    }
}