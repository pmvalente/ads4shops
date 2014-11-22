<?php

class NegociosController extends BaseController
{
    protected $negocio;

    public function __construct(Negocio $negocio)
    {
        parent::__construct();
        $this->negocio = $negocio;
    }

    //criar o smetodos q o framework já fornece. os nomes tem de ser iguais

    public function index()
    {
        $nome = null;

        $sort = 'nome';
        $order = Input::get('nome') === 'desc' ? 'desc' : 'asc';

        //fazer a consulta
        $negocios = $this->negocio->orderBy($sort, $order);//é igual a select * from negocios orderby nome

        //filtro
        if(Input::has('nome')){
            $negocios = $negocios->where('nome', 'LIKE', "%" . Input::get('nome') . "%");
            $nome = '&nome=' . Input::get('nome');
        }

        $negocios = $negocios->paginate(15);//numeros de registos por página

        //para segurar as configutrçaões da página
        $pagination = $negocios->appends(array(
            'nome' => Input::get('nome'),
            'sort' =>  Input::get('sort'),
            'order' => Input::get('order')
        ))->links();

        return View::make('negocios.index')
            ->with(array(
                'nome' => Input::get('nome'),
                'negocios' => $negocios,
                'pagination' => $pagination,
                'str' => '&order=' . (Input::get('order') == 'asc' || null ? 'desc' : 'asc') . $nome
            ));
    }
}