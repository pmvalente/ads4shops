<?php

class NegociosController extends BaseController
{
    protected $negocio;

    public function __construct(Negocio $negocio)
    {
        parent::__construct();
        $this->negocio = $negocio;
    }

    //criar os metodos q o framework já fornece. os nomes tem de ser iguais

    public function index()
    {
        $nome = null;

        $sort = 'nome';
        $order = Input::get('order') === 'desc' ? 'desc' : 'asc';


        //fazer a consulta
        $negocios = $this->negocio->orderBy($sort, $order);//é igual a select * from negocios orderby nome

        //filtro
        if(Input::has('nome')){
            $negocios = $negocios->where('nome', 'LIKE', "%" . Input::get('nome') . "%");
            $nome = '&nome=' . Input::get('nome');
        }


        $negocios = $negocios->paginate(10);//numeros de registos por página

        //para segurar as configutrçaões da página
        $pagination = $negocios->appends(array(
            'nome' => Input::get('nome'),
            'sort' =>  Input::get('sort'),
            'order' => Input::get('order'),
        ))->links();

        return View::make('negocios.index')
            ->with(array(
                'nome' => Input::get('nome'),
                'negocios' => $negocios,
                'pagination' => $pagination,
                'str' => '&order=' . (Input::get('order') == 'asc' || null ? 'desc' : 'asc') . $nome
            ));
    }

    public function create()
    {
        return View::make('negocios.create');
    }

    public function store()
    {
        $input = Input::all();
        $validator = Negocio::validate($input);

        if($validator->fails()){//ISTO ESTÁ A DAR PROBLEMA
            return Redirect::back()
                ->with('error', Util::message('MSG001'))
                ->withErrors($validator)
                ->withInput();
        } else{
            $this->negocio->create($input);

            return Redirect::to('negocio')
                ->with('sucess', Util::message('MSG002'));
        }

    }

    public function edit($id)
    {
        //verifica se id existe
        $negocio = $this->negocio->find($id);
        if(is_null($negocio)){
            return Redirect::to('negocio')
                ->with('error', Util::message('MSG003'));
        }

        return View::make('negocios.edit')
                ->with('negocio', $negocio);
    }

    public function update($id)
    {
        $input = Input::all();
        $input['id'] = $id;


        $validator = Negocio::validate($input);

        if($validator->fails()){//ISTO ESTÁ A DAR PROBLEMA
            return Redirect::back()
                ->with('error', Util::message('MSG004'))
                ->withErrors($validator)
                ->withInput();
        } else{
            $this->negocio->find($id)->update($input);

            return Redirect::to('negocio')
                ->with('success', Util::message('MSG005'));
        }
    }

    public function destroy($id)
    {
        try{
            $this->negocio->find($id)->delete();
            return Redirect::to('negocio')
                ->with('success', Util::message('MSG006'));
        } catch (Exception $e){
            return Redirect::to('negocio')
                ->with('warning', Util::message('MSG007'));
        }
    }
}