<?php

class UtilizadoresController extends BaseController
{
    protected $utilizador;

    public function __construct(Utilizador $utilizador)
    {
        parent::__construct();
        $this->utilizador = $utilizador;
    }

    //criar os metodos q o framework já fornece. os nomes tem de ser iguais

    public function index()
    {
        $nome = $email = $ativo = $negocio_id = null;

        $fields = array('nome', 'email', 'ativo');
        $sort = in_array(Input::get('sort'), $fields) ? Input::get('sort') : 'nome';
        $order = Input::get('order') === 'desc' ? 'desc' : 'asc';


        //fazer a consulta
        $utilizadores = $this->utilizador->orderBy($sort, $order);//é igual a select * from utilizadores orderby nome

        //filtro
        if(Input::has('nome')){
            $utilizadores = $utilizadores->where('nome', 'LIKE', "%" . Input::get('nome') . "%");
            $nome = '&nome=' . Input::get('nome');
        }


        $utilizadores = $utilizadores->paginate(10);//numeros de registos por página

        //para segurar as configutrçaões da página
        $pagination = $utilizadores->appends(array(
            'nome' => Input::get('nome'),
            'sort' =>  Input::get('sort'),
            'order' => Input::get('order'),
        ))->links();

        return View::make('utilizadores.index')
            ->with(array(
                'nome' => Input::get('nome'),
                'utilizadores' => $utilizadores,
                'pagination' => $pagination,
                'str' => '&order=' . (Input::get('order') == 'asc' || null ? 'desc' : 'asc') . $nome
            ));
    }

    public function create()
    {
        return View::make('utilizadores.create');
    }

    public function store()
    {
        $input = Input::all();
        $validator = Utilizador::validate($input);

        if($validator->fails()){//ISTO ESTÁ A DAR PROBLEMA
            return Redirect::back()
                ->with('error', Util::message('MSG001'))
                ->withErrors($validator)
                ->withInput();
        } else{
            $this->utilizador->create($input);

            return Redirect::to('utilizador')
                ->with('sucess', Util::message('MSG002'));
        }

    }

    public function edit($id)
    {
        //verifica se id existe
        $utilizador = $this->utilizador->find($id);
        if(is_null($utilizador)){
            return Redirect::to('utilizador')
                ->with('error', Util::message('MSG003'));
        }

        return View::make('utilizadores.edit')
            ->with('utilizador', $utilizador);
    }

    public function update($id)
    {
        $input = Input::all();



        $validator = Utilizador::validate($input);

        if($validator->fails()){//ISTO ESTÁ A DAR PROBLEMA
            return Redirect::back()
                ->with('error', Util::message('MSG004'))
                ->withErrors($validator)
                ->withInput();
        } else{
            $this->utilizador->find($id)->update($input);

            return Redirect::to('utilizador')
                ->with('success', Util::message('MSG005'));
        }
    }

    public function destroy($id)
    {
        try{
            $this->utilizador->find($id)->delete();
            return Redirect::to('utilizador')
                ->with('success', Util::message('MSG006'));
        } catch (Exception $e){
            return Redirect::to('utilizador')
                ->with('warning', Util::message('MSG007'));
        }
    }
}